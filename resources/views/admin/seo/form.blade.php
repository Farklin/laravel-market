
<div class="card p-3">
 
    @if(!isset($seo))
        {{ Form::label('title_seo','SEO Title',array('id'=>'','class'=>'')) }}
        {{ Form::text('title_seo','',array('id'=>'seo_title','placeholder'=>'', 'class'=>'form-control')) }}

        {{ Form::label('description_seo','SEO Description',array('id'=>'','class'=>'')) }}
        {{ Form::text('description_seo','',array('id'=>'seo_description', 'placeholder'=>'',  'class'=>'form-control')) }}

        {{ Form::label('keywords_seo','SEO Keywords',array('id'=>'','class'=>'')) }}
        {{ Form::text('keywords_seo','',array('id'=>'','placeholder'=>'',  'class'=>'form-control')) }}

        {{ Form::label('slug','URL',array('id'=>'','class'=>'')) }}
        {{ Form::text('slug','',array('id'=>'','placeholder'=>'',  'class'=>'form-control')) }}
    @else 
        {{ Form::label('title_seo','SEO Title',array('id'=>'','class'=>'')) }}
        {{ Form::text('title_seo',$seo->title ,array('id'=>'','placeholder'=>'',  'class'=>'form-control')) }}

        {{ Form::label('description_seo','SEO Description',array('id'=>'','class'=>'')) }}
        {{ Form::text('description_seo',$seo->description ,array('id'=>'','placeholder'=>'', 'class'=>'form-control')) }}

        {{ Form::label('keywords_seo','SEO Keywords',array('id'=>'','class'=>'')) }}
        {{ Form::text('keywords_seo',$seo->keywords,array('id'=>'','placeholder'=>'', 'class'=>'form-control')) }}

        {{ Form::label('slug','URL',array('id'=>'','class'=>'')) }}
        {{ Form::text('slug',$seo->slug,array('id'=>'','class'=>'form-control')) }}
    @endif 
</div>