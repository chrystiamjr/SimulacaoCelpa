/*
 * This file is part of HTML Barcode SDK.
 *
 *
 * ConnectCode provides its HTML Barcode SDK under a dual license model designed 
 * to meet the development and distribution needs of both commercial application 
 * distributors and open source projects.
 *
 * For open source projects, please see the GNU GPL notice below. 
 *
 * For Commercial Application Distributors (OEMs, ISVs and VARs), 
 * please see <http://www.barcoderesource.com/duallicense.shtml> for more information.
 *
 *
 *
 *
 * GNU GPL v3.0 License 
 *
 * HTML Barcode SDK is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * HTML Barcode SDK is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

		function DrawHTMLBarcode_Code39ASCII(data,
						    checkDigit,
						    humanReadable,
						    units,
						    minBarWidth,
						    width,height,
						    barWidthRatio,
						    textLocation,
						    textAlignment,
						    textStyle,
						    foreColor,
						    backColor)
		{
			return DrawBarcode_Code39ASCII(data,
						 checkDigit,
						 humanReadable,
						 units,
						 minBarWidth,
						 width,height,
						 barWidthRatio,
						 textLocation,
						 textAlignment,
						 textStyle,
						 foreColor,
						 backColor,
						 "html");
		}

            function DrawBarcode_Code39ASCII(data,
						    checkDigit,
						    humanReadable,
						    units,
						    minBarWidth,
						    width,height,
						    barWidthRatio,
						    textLocation,
						    textAlignment,
						    textStyle,
						    foreColor,
						    backColor,mode)
		{
			  if (foreColor==undefined)
				foreColor="black";
			  if (backColor==undefined)
				backColor="white";

			  if (textLocation==undefined)
				textLocation="bottom";
			  else if (textLocation!="bottom" && textLocation!="top")
				textLocation="bottom";
			  if (textAlignment==undefined)
				textAlignment="center";
			  else if (textAlignment!="center" && textAlignment!="left" && textAlignment!="right")
				textAlignment="center";
			  if (textStyle==undefined)
				textStyle="";
			  if (barWidthRatio==undefined)
				barWidthRatio=3;			  
			  if (height==undefined)
				height=1;
			  else if (height<=0 || height >15)
				height=1;
			  if (width==undefined)
				width=3;
			  else if (width<=0 || width >15)
				width=3;
			  if (minBarWidth==undefined)
			      minBarWidth=0;
			  else if (minBarWidth<0 || minBarWidth >2)
			      minBarWidth=0;
			  if (units==undefined)
				units="in";
			  else if (units!="in" && units !="cm")
				units="in";
			  if (humanReadable==undefined)
				humanReadable="yes";
			  else if (humanReadable!="yes" && humanReadable !="no")
				humanReadable="yes";

			  var encodedData=EncodeCode39ASCII(data,checkDigit);	
                    var humanReadableText = Get_Human_Text(data,checkDigit);
  		        var encodedLength = 0;
                    var thinLength = 0;
                    var thickLength = 0.0;
                    var totalLength = 0.0;
                    var incrementWidth = 0.0;
                    var swing = 1;
			  var result="";
			  var barWidth=0;
			  var thickWidth=0.0;
			  var svg;
                    if (barWidthRatio >= 2 && barWidthRatio <= 3)
                    {
                    }
                    else
                        barWidthRatio = 3;

                    for (x = 0; x < encodedData.length; x++)
                    {
                        if (encodedData.substr(x,1) == 't')
                        {
                            thinLength++;
                            encodedLength++;
                        }
                        else if (encodedData.substr(x,1) == 'w')
                        {
                            thickLength = thickLength + barWidthRatio;
                            encodedLength = encodedLength + 3;
                        }
                    }
                    totalLength = totalLength + thinLength + thickLength;

                    if (minBarWidth > 0)
                    {
                        barWidth = minBarWidth.toFixed(2);
                        width=barWidth * totalLength;
                    }
                    else
                        barWidth = (width / totalLength).toFixed(2);

                    thickWidth = barWidth * 3;
                    if (barWidthRatio >= 2 && barWidthRatio <= 3.0)
                    {
                        thickWidth = barWidth * barWidthRatio;
                    }
	
			  if (mode=="html")
			  {
				  if (textAlignment=='center')
					  result='<div style="text-align:center">';
				  else if (textAlignment=='left')
					  result='<div style="text-align:left;">';
				  else if (textAlignment=='right')
					  result='<div style="text-align:right;">';

				  var humanSpan="";
				  if (humanReadable=='yes' && textLocation=='top')
				  {
					if (textStyle=='')
						humanSpan='<span style="font-family : arial; font-size:12pt">'+humanReadableText+'</span><br />';
					else
						humanSpan='<span style='+textStyle+'>'+humanReadableText+'</span><br />';
				  }
				  result=result+humanSpan;
			  }
			  
                    for (x = 0; x < encodedData.length; x++)
                    {
                        var brush;
                        if (swing == 0)
                            brush = backColor;
                        else
                            brush = foreColor;
                        if (encodedData.substr(x,1) == 't')
                        {
				  if (mode=="html")
				    result=result
					     +'<span style="border-left:'
					     +barWidth
					     +units
					     +' solid ' 
					     +brush
					     +';height:'
					     +height
					     +units+';display:inline-block;"></span>';
			        incrementWidth = incrementWidth + barWidth;
				}
                        else if (encodedData.substr(x,1) == 'w')
                        {
				  if (mode=="html")
				    result=result
					     +'<span style="border-left :'
					     +thickWidth
					     +units+' solid ' 
					     +brush
					     +';height:'
					     +height
					     +units+';display:inline-block;"></span>';
	                    incrementWidth = incrementWidth + thickWidth;
				}

                        if (swing == 0)
                            swing = 1;
                        else
                            swing = 0;
                    }

			  if (mode=="html")
			  {
				  var humanSpan="";
				  if (humanReadable=='yes' && textLocation=='bottom')
				  {
					if (textStyle=='')
						humanSpan='<br /><span style="font-family : arial; font-size:12pt">'+humanReadableText+'</span>';
					else
						humanSpan='<br /><span style='+textStyle+'>'+humanReadableText+'</span>';
				  }
				  result=result+humanSpan+"</div>";
			  }

			  return result;	
		}
        
            function EncodeCode39ASCII(data,checkDigit)
            {
                var fontOutput = ConnectCode_Encode_Code39ASCII(data,checkDigit);
                var output = "";
                var pattern = "";
                for (x = 0; x < fontOutput.length; x++)
                {
                    switch (fontOutput.substr(x,1))
                    {
                        case '1':
                            pattern = "wttwttttwt";
                            break;
                        case '2':
                            pattern = "ttwwttttwt";
                            break;
                        case '3':
                            pattern = "wtwwtttttt";
                            break;
                        case '4':
                            pattern = "tttwwtttwt";
                            break;
                        case '5':
                            pattern = "wttwwttttt";
                            break;
                        case '6':
                            pattern = "ttwwwttttt";
                            break;
                        case '7':
                            pattern = "tttwttwtwt";
                            break;
                        case '8':
                            pattern = "wttwttwttt";
                            break;
                        case '9':
                            pattern = "ttwwttwttt";
                            break;
                        case '0':
                            pattern = "tttwwtwttt";
                            break;
                        case 'A':
                            pattern = "wttttwttwt";
                            break;
                        case 'B':
                            pattern = "ttwttwttwt";
                            break;
                        case 'C':
                            pattern = "wtwttwtttt";
                            break;
                        case 'D':
                            pattern = "ttttwwttwt";
                            break;
                        case 'E':
                            pattern = "wtttwwtttt";
                            break;
                        case 'F':
                            pattern = "ttwtwwtttt";
                            break;
                        case 'G':
                            pattern = "tttttwwtwt";
                            break;
                        case 'H':
                            pattern = "wttttwwttt";
                            break;
                        case 'I':
                            pattern = "ttwttwwttt";
                            break;
                        case 'J':
                            pattern = "ttttwwwttt";
                            break;
                        case 'K':
                            pattern = "wttttttwwt";
                            break;
                        case 'L':
                            pattern = "ttwttttwwt";
                            break;
                        case 'M':
                            pattern = "wtwttttwtt";
                            break;
                        case 'N':
                            pattern = "ttttwttwwt";
                            break;
                        case 'O':
                            pattern = "wtttwttwtt";
                            break;
                        case 'P':
                            pattern = "ttwtwttwtt";
                            break;
                        case 'Q':
                            pattern = "ttttttwwwt";
                            break;
                        case 'R':
                            pattern = "wtttttwwtt";
                            break;
                        case 'S':
                            pattern = "ttwtttwwtt";
                            break;
                        case 'T':
                            pattern = "ttttwtwwtt";
                            break;
                        case 'U':
                            pattern = "wwttttttwt";
                            break;
                        case 'V':
                            pattern = "twwtttttwt";
                            break;
                        case 'W':
                            pattern = "wwwttttttt";
                            break;
                        case 'X':
                            pattern = "twttwtttwt";
                            break;
                        case 'Y':
                            pattern = "wwttwttttt";
                            break;
                        case 'Z':
                            pattern = "twwtwttttt";
                            break;
                        case '-':
                            pattern = "twttttwtwt";
                            break;
                        case '.':
                            pattern = "wwttttwttt";
                            break;
                        case ' ':
                            pattern = "twwtttwttt";
                            break;
                        case '*':
                            pattern = "twttwtwttt";
                            break;
                        case '$':
                            pattern = "twtwtwtttt";
                            break;
                        case '/':
                            pattern = "twtwtttwtt";
                            break;
                        case '+':
                            pattern = "twtttwtwtt";
                            break;
                        case '%':
                            pattern = "tttwtwtwtt";
                            break;
				default : break;
                    }
                    output=output+pattern;
                }
                return output;
            }

		function Get_Human_Text(data,checkDigit)
		{
			var Result="";
			// var cd="";
			var filtereddata="";
			var humandata="";
			filtereddata = filterInput(data);
			var filteredlength = filtereddata.length;
			if (checkDigit==1)
			{
				if (filteredlength > 254)
				{
					filtereddata = filtereddata.substr(0,254);
				}
				humandata=filtereddata;
			      filtereddata = getCode39ASCIIMappedString(filtereddata);
				// cd = generateCheckDigit(filtereddata);
			}
			else
			{
				if (filteredlength > 255)
				{
					filtereddata = filtereddata.substr(0,255);
				}
				humandata=filtereddata;
			      filtereddata = getCode39ASCIIMappedString(filtereddata)
			}
			Result = humandata;
			// Result = "*" + humandata+"*";
			// Result = "*" + humandata+cd+"*";
  		      Result=html_decode(html_escape(Result));
			return Result;
		}

		function ConnectCode_Encode_Code39ASCII(data,checkDigit)
		{
			var Result="";
			// var cd="";
			var filtereddata="";
			filtereddata = filterInput(data);
			var filteredlength = filtereddata.length;
			if (checkDigit==1)
			{
				if (filteredlength > 254)
				{
					filtereddata = filtereddata.substr(0,254);
				}
			      filtereddata = getCode39ASCIIMappedString(filtereddata);
				// cd = generateCheckDigit(filtereddata);
			}
			else
			{
				if (filteredlength > 255)
				{
					filtereddata = filtereddata.substr(0,255);
				}
			      filtereddata = getCode39ASCIIMappedString(filtereddata)
			}
			Result = "*" + filtereddata+"*";
			// Result = "*" + filtereddata+cd+"*";
  		      Result=html_decode(html_escape(Result));
			return Result;
		}


		function getCode39ASCIIMappedString(inputx)
		{
			var CODE39ASCIIMAP=["%U", "$A", "$B", "$C", "$D", "$E", "$F", "$G", "$H", "$I", "$J", "$K", "$L", "$M", "$N", "$O", "$P", "$Q", "$R", "$S", "$T", "$U", "$V", "$W", "$X", "$Y", "$Z", "%A", "%B", "%C", "%D", "%E", " ", "/A", "/B", "/C", "/D", "/E", "/F", "/G", "/H", "/I", "/J", "/K", "/L", "-", ".", "/O", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "/Z", "%F", "%G", "%H", "%I", "%J", "%V", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "%K", "%L", "%M", "%N", "%O", "%W", "+A", "+B", "+C", "+D", "+E", "+F", "+G", "+H", "+I", "+J", "+K", "+L", "+M", "+N", "+O", "+P", "+Q", "+R", "+S", "+T", "+U", "+V", "+W", "+X", "+Y", "+Z", "%P", "%Q", "%R", "%S", "%T"];
			var strResult="";
			var datalength=inputx.length;
			for (x=0;x<datalength;x++)
			{
				strResult=strResult+CODE39ASCIIMAP[inputx.charCodeAt(x)];
			}
			return strResult;
		}

		function getCode39Character(inputdecimal) {
			var CODE39MAP=["0","1","2","3","4","5","6","7","8","9",
							"A","B","C","D","E","F","G","H","I","J",
							"K","L","M","N","O","P","Q","R","S","T",
							"U","V","W","X","Y","Z","-","."," ","$",
							"/","+","%"];
			return CODE39MAP[inputdecimal];
		}

		function getCode39Value(inputchar) {
			var CODE39MAP=["0","1","2","3","4","5","6","7","8","9",
							"A","B","C","D","E","F","G","H","I","J",
							"K","L","M","N","O","P","Q","R","S","T",
							"U","V","W","X","Y","Z","-","."," ","$",
							"/","+","%"];
			var RVal=-1;
			for (i=0;i<43;i++)
			{
				if (inputchar==CODE39MAP[i])
				{
					RVal=i;
				}
			}
			return RVal;
		}

		function filterInput(data)
		{
			var Result="";
			var datalength=data.length;
			for (x=0;x<datalength;x++)
			{
				if ((data.charCodeAt(x)>=0) && (data.charCodeAt(x)<=127))
				{
					Result = Result + data.substr(x,1);
				}
			}

			return Result;
		}

		function generateCheckDigit(data)
		{
			var Result="";
			var datalength=data.length;
			var sumValue=0;
			for (x=0;x<datalength;x++)
			{
				sumValue=sumValue+getCode39Value(data.substr(x,1));
			}
			sumValue=sumValue % 43;
			return getCode39Character(sumValue);
		}

		function html_escape(data)
		{
			var Result="";
			for (x=0;x<data.length;x++)
			{
				Result=Result+"&#"+data.charCodeAt(x).toString()+";";
			}
			return Result;
		}

		function html_decode(str) {
			var ta=document.createElement("textarea");
		      ta.innerHTML=str.replace(/</g,"&lt;").replace(/>/g,"&gt;");
		      return ta.value;
		}

