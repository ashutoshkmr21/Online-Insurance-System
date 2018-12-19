<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title>LIGHTBOX EXAMPLE</title>
        <style>
        .black_overlay{
            display: none;
            position: absolute;
            top: 0%;
            left: 0%;
            width: 100%;
            height: 100%;
            background-color: black;
            z-index:1001;
            -moz-opacity: 0.8;
            opacity:.80;
            filter: alpha(opacity=80);
        }
        .white_content {
            display: none;
            position: absolute;
            top: 25%;
            left: 25%;
            width: 50%;
            height: 50%;
            padding: 16px;
            border:none;
            background-color: white;
            z-index:1002;
            overflow: hidden;
        }
    #light label{
    display:block;
    text-align:left;
    margin-top: 10px;
    width:200px;
    float:none;
    padding-left:10px;
    font-family: Kavoon;

             }
    #light input{
    display: block;
    height: 30px;
    float:left;
    padding:5px;
    width:210px;
    margin:2px 0 20px 10px;
    font-family: Nova;
    font-size: 12px;

}
#light button{
    display: inline-block;
    
    margin:2px 0 20px 10px;
    width:210px;
    height:38px;
    
    background-color: #0071CC;
    color:#FFFFFF;
    text-align:center;
    font-size: 18px;
    font-family: Nova;
    border-radius: 5px;
    outline: none;

}
#light button:hover
{
    background: #428217;
}    

#left_side{
float: left;
width:40%;
}
#right_side{
    margin-top: -35%;
    float:left;
    width:350px;
    margin-left: 45%;
    height: 350px;
}
    </style>
    <script type="text/javascript">

   window.document.onkeydown = function (e)
{
    if (!e){
        e = event;
    }
    if (e.keyCode == 27){
        lightbox_close();
    }
}

function lightbox_open(){
    window.scrollTo(0,0);
    document.getElementById('light').style.display='block';
    document.getElementById('fade').style.display='block';
    //document.getElementById('fr').innerHTML="a.html";
}

function lightbox_close(){
    document.getElementById('light').style.display='none';
    document.getElementById('fade').style.display='none';
}
  </script>
    </head>
    <body onload="lightbox_open();">
        
        <div id="light" class="white_content">
            <p style="padding-left:650px;margin-top:-1;">
            <a href = "javascript:void(0)" onclick="lightbox_close();"><img src="close.png"></a>
            </p>
        <div id="left_side">
        <form name="login" >

        <label>Username</label>
        <input type="text" name="user">
        <br/>
        <label>Password</label>

        <input type="password" name="pass">
        <br/><br/><br/>
        <button type="submit">Submit</button>
    </form>
    </div>
    <div id="right_side"><iframe src="slider.html" frameborder="0" width="340px" height="340px" scrollbar="none"></iframe></div>
        </div>
    
        <div id="fade" class="black_overlay"></div>
        
    </body>
</html>