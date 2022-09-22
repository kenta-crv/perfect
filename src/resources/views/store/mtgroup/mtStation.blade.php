<div class="s-station_list">
    <div class="lbl-txt-01 lbl-txt-01-m0 mgn-r-2" >
        <div class="lbl-txt-01 lbl-txt-01-m0">
            <div class="act-cat">
            <input type="checkbox" class="plan-house-type routes_clicked" checked="checked" name="routes[]" id="route_{{ $index }}" value="{{$line->line_name}}" style="pointer-events: none;" hidden>
            <label for="route_{{$index}}" class="c-lbl-green vd_dt_typ c-input--width200" style="pointer-events: none;">{{$line->line_name}}</label>
            </div>
        </div>      
    </div>
    <div class="act-cat l-12 flex-1">
        @foreach ($stations as $key => $station)
            <div class="lbl-txt-01 lbl-txt-01-m0">
                <div class="act-cat">
                    <input type="checkbox" class="station_payloads" name="station[]" id="station[{{$line->line_name}}]_{{ $key }}" value="{{$station->station_name}}" hidden>
                    <label for="station[{{$line->line_name}}]_{{ $key }}" class="c-lbl-white vd_dt_typ">{{$station->station_name}}</label>
                </div>
            </div>      
        @endforeach
    </div>
</div>



