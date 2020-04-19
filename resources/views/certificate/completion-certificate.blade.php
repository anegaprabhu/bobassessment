
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <style>
    * { 
        /* font-family: DejaVu Sans, sans-serif; */
      font-size: 12px;
     }
  </style>
        <style>
            /** Define the margins of your page **/
            @page {
                margin: 48.7px 24.5px;
            }

            header {
                position: fixed;
                top: -48.7px;
                left: 0px;
                right: 0px;
                height: 48.7px;

                /** Extra personal styles **/
                /*background-color: orange;*/
                color: black;
                text-align: center;
                /*line-height: 35px;*/
                border: 1px solid green;
            }

            footer {
                position: fixed; 
                bottom: -48px; 
                left: 0px; 
                right: 0px;
                height: 48.7px; 

                /** Extra personal styles **/
                border: 1px solid green;
                background-color: white;
                color: white;
                text-align: center;
                /* line-height: 35px; */
            }



              /*Table style*/

            #materials {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            }

            #materials td, #materials th {
            border: 1px solid #ddd;
            padding: 8px;
            }

            #materials tr:nth-child(even){
                background-color: #f2f2f2;
            }

            #materials tr:hover {
                background-color: #ddd;
            }

            #materials th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
            }
            body{
              width: 794px;
            }
            main{
                border: 0;
                background: url("{{public_path().'/images/certificate-blank.png'}}");
                -webkit-background-size: 100% 100%;
                -moz-background-size: 100% 100%;
                -o-background-size: 100% 100%;
                background-size: 100% 100%;
            }
        </style>
    </head>
    <body>
        <!-- Wrap the content of your PDF inside a main tag -->
        <main>
          <img style="position: absolute; top: -47px; left: -22px; border: 0px solid red;" src="{{public_path().'/images/certificate-blank.png'}}" width="100%" height="auto">
          <div style="position: absolute; width: 100%; top: 490px; left: -25px; text-align: center; font-size: 45px">{{$student[0]->student_name}}</div>  
        </main>      

    </body>
</html>
