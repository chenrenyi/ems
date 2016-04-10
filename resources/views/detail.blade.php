<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>历史通知</title>
    <style type="text/css">
    	body{
    		padding: 0;
    		margin: 0;
    	}
    	.wrapper{
    		padding: 20px 15px 15px;
    		background-color: #fff;
    	}
    	.title{
    		margin-top: 0;
		    margin-bottom: 10px;
		    line-height: 1.4;
		    font-weight: 400;
		    font-size: 24px;
		    font-family: "Helvetica Neue",Helvetica,"Hiragino Sans GB","Microsoft YaHei",Arial,sans-serif;
    	}
    	.info{
    		color: rgb(140, 140, 140);
    		font-size: 17px;
    		margin-top: 0;
    		margin-bottom: 18px;    		
    	}
    	.time{
			
    	}

    	.article{
    		color: rgb(112, 105, 108);
		    font-family: Simsun;
		    font-size: medium;
		    white-space: normal;
		    line-height: 1.5;
    	}
    </style>
</head>
<body>
	<div class="wrapper">
		<h2 class="title">{{ $notice->title }}</h2>
		<p class="info"><span class="time">{{ substr($notice->created_at, 0, 10) }} </span><span class="author"> 微信教学平台</span></p>
		<div class="article">
			{{ $notice->content }}
		</div>			
	</div>
</body>	
</html>