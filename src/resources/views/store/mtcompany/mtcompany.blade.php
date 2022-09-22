@foreach($companies as $company)
{{-- {{ dd($company['company_name']) }} --}}
    <div class="s-station_list">
        <div class="lbl-txt-01 lbl-txt-01-m0 mgn-r-2" >
            <div class="lbl-txt-01 lbl-txt-01-m0">
                {{-- {{ dd($company) }} --}}
                <div class="act-cat">
                <input type="checkbox" class="plan-house-type routes_clicked" checked="checked" name="company[]" id="companies_{{ $index }}" value="{{$company['company_name']}}" style="pointer-events: none;" hidden>
                <label for="route_{{$index}}" class="c-lbl-green vd_dt_typ c-input--width200" style="pointer-events: none;">{{$company['company_name']}}</label>
                </div>
            </div>      
        </div>
        <div class="act-cat l-12 flex-1">
            @foreach ($company['line_names'] as $key => $route)
                <div class="lbl-txt-01 lbl-txt-01-m0">
                    <div class="act-cat">
                        <input type="checkbox" class="plan-house-type selectPrefecture routes_clicked" name="routes[]" id="prefs_{{ $key }}_{{ $company['company_name'] }}" value="{{$route}}" hidden>
                        <label for="prefs_{{ $key }}_{{ $company['company_name'] }}" class="c-lbl-white vd_dt_typ">{{$route}}</label>
                        {{-- <input type="checkbox" value="{{$station->station_name}}" name="station[]" id="station[{{$line->line_name}}]_{{ $key }}" hidden>
                        <label for="station[{{$line->line_name}}]_{{ $key }}" class="c-lbl-white vd_dt_typ ">{{$station->station_name}}</label> --}}
                    </div>
                </div>      
            @endforeach
        </div>
    </div>
@endforeach