<div class="form-group row">
    <label for="{{$name}}" class="{{@$leftCol??'col-sm-6'}} col-form-label text-md-right">{{$label}}</label>
    <div class="{{@$rightCol??'col-sm'}}">
        <div class="input-group">
            @if(isset($prepend) && strlen(trim($prepend)) > 0)
                <div class="input-group-prepend">
                    @if($prepend != strip_tags($prepend))
                        {!! $prepend !!}
                    @else
                        <span class="input-group-text">{{$prepend}}</span>
                    @endif
                </div>
            @endif
            <input class="form-control {{$errors->has($name) || $errors->has($selectName)  ? 'is-invalid' : null}}"
                   type="{{@$type?:'text'}}"
                   name="{{$name}}" id="{{$name}}" aria-describedby="{{$name}}HelpId"
                   value="{{old($name, $value)}}"
                   @if(@$placeholder) placeholder="{{@$placeholder}}" @endif
                   @if(@$pattern) pattern="{{@$pattern}}" @endif
                   @if($type == 'number') step="{{@$step?:1}}" @endif
                   @if($type == 'number') min="{{@$min?:0}}" @endif
                   @if($type == 'number' && isset($max)) max="{{@$max}}" @endif
            />
                @if(isset($append) && strlen(trim($append)) > 0)
                    <div class="input-group-append">
                        @if($append != strip_tags($append))
                            {!! $append !!}
                        @else
                            <span class="input-group-text">{{$append}}</span>
                        @endif
                    </div>
                @endif
                @if(isset($selectPrepend) && strlen(trim($selectPrepend)) > 0)
                    <div class="input-group-prepend">
                        @if($selectPrepend != strip_tags($selectPrepend))
                            {!! $selectPrepend !!}
                        @else
                            <span class="input-group-text">{{$selectPrepend}}</span>
                        @endif
                    </div>
                @endif
                <select type="text" class="form-control custom-select {{$errors->has($name) || $errors->has($selectName)  ? 'is-invalid' : null}}"
                        name="{{$selectName}}" id="{{$selectName}}"
                        aria-describedby="{{$selectName}}HelpId">
                    <option value="">Select</option>
                    @foreach($options as $option)
                        <option
                                {{old($selectName, $selectValue) == $option[$optionValueKey] ? 'selected' : null}}
                                value="{{$option[$optionValueKey]}}"
                        >{{$option[$optionTextKey]}}</option>
                    @endforeach
                </select>
                @if(isset($selectAppend) && strlen(trim($selectAppend)) > 0)
                    <div class="input-group-append">
                        @if($selectAppend != strip_tags($selectAppend))
                            {!! $selectAppend !!}
                        @else
                            <span class="input-group-text">{{$selectAppend}}</span>
                        @endif
                    </div>
                @endif
        </div>

        @if($errors->has($name) || $errors->has($selectName))
            <small id="{{$name}}HelpId" class="form-text text-danger">{{$errors->first($name)}} {{$errors->first($selectName)}}</small>
        @else
            <small id="{{$name}}HelpId" class="form-text text-muted">{{$helpText}}</small>
        @endif
    </div>
</div>
