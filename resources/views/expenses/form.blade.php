<div class="row">
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <h4 class="header2">Types Expenses</h4>
            <div class="row">
                <div class="col s12">
                    
                    <div class="input-field col s6">
                        <input type="text" name="name" class="" required="required" id="name" value="{{$expense->name}}">
                        <label>{{ trans('messages.name') }}</label>
                    </div>
                    
                    <div class="input-field col s6">
                        <input type="text" name="description" class="" required="required" id="description" value="{{$expense->description}}">
                        <label>{{ trans('messages.description') }}</label>
                    </div>

                </div>
                
                <div class="col s12">
                    <div class="input-field col s6">
                        <select type="number" name="status" class="" required="required" id="status" >
                            <option value="" disabled=""></option>
                            <option value="1">{{ trans('messages.active') }}</option>
                            <option value="0">{{ trans('messages.inactive') }}</option>
                        </select>
                        <label>{{ trans('messages.status') }}</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <button class="btn waves-effect waves-light light-blue darken-4 right" type="submit" name="action">{{isset($buttonText) ? $buttonText : trans('messages.save')}}</button>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>