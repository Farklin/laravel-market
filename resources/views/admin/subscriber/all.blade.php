
@extends('admin.layouts.home')
@section('title', 'Все товары')
@section('content')


        <div class="row">
            Колличесвто подписчиков: {{ count($subscribers) }}
        </div>
        <table>

            @foreach($subscribers as $subscriber)
                <tr class="table"> 
                    <td>
                        {{$subscriber->email}}
                        
                    </td>
                    <td>
                        @if($subscriber->status)
                            <span class="text-info">Подписан</span>
                        @else
                            <span class="text-danger">Отписался</span>
                        @endif 
                    </td>
                    <td>
                        
                    </td>
                    <td>
                      
                    </td>
                </tr> 
            @endforeach

        </table>
    </div>
    

@endsection

