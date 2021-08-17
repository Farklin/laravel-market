<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Создать товар</title>
</head>
<body>
    {{ Form::open(array('route'=>'product_create')) }}
    {{ Form::label('title','Название товара',array('id'=>'','class'=>'')) }}
    {{ Form::text('title','',array('id'=>'','class'=>'')) }}


    {{ Form::label('description','Цена товара',array('id'=>'','class'=>'')) }}
    {{ Form::textarea('description','',array('id'=>'','class'=>'')) }}


    {{ Form::label('price','Цена товара',array('id'=>'','class'=>'')) }}
    {{ Form::number('price','',array('id'=>'','class'=>'')) }}

    
    {{ Form::label('old_price','Старая цена товара',array('id'=>'','class'=>'')) }}
    {{ Form::number('old_price','',array('id'=>'','class'=>'')) }}
    
    {{ Form::submit('Создать') }}
	{{ Form::close() }}
</body>
</html>