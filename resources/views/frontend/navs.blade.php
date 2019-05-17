@inject('navs',App\FooterBrands')
<div class="nav_down">
    <ul>
        @foreach($navs->navTypes()  as $typename=>$brandtypes)
        <li>
            <a href="/{{$navs->navTops()[$typename]->real_path}}/"><i class="icon icon{{$loop->iteration}}"></i>{{$typename}}</a>
            <div class="index_item_list">
                <dl>
                    <dt><a href="/{{$navs->navTops()[$typename]->real_path}}/" target="_blank" title="{{$typename}}">{{$typename}}</a></dt>
                    <dd>
                        @foreach($brandtypes as $brandtype)
                        <span> <a href="/{{$brandtype->real_path}}/">{{$brandtype->typename}}</a> </span>
                        @endforeach
                    </dd>
                </dl>
            </div>
        </li>
        @endforeach
    </ul>
</div>
