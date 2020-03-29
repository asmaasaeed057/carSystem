

        <div class="col-md-6">

            <div class="form-group">
                    <label>{{__('site.itemName')}}</label>
                    <input type="text" class="form-control" name="ItemName[]" id="" value="{{ old('ItemName.0') }}">
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>{{__('site.qty')}}</label>
                    <input type="number" class="form-control " name="qty[]" id="qty" value="{{ old('qty.0') ? old('qty.0'):"0"  }}">
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>{{__('site.price')}}</label>
                    <input type="number" class="form-control " name="price[]" id="price" value="{{ old('price.0') ? old('price.0'):"0"  }}">
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>{{__('site.subTotal')}}</label>
                    <input type="number" class="form-control " name="subTotal[]" value="" id="subtotal" value="{{ old('subtotal.0') ? old('subtotal.0'):"0"  }}">
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>{{__('site.tax')}}</label>
                    <input type="text" class="form-control " name="tax[]" id="tax" value="{{ old('tax.0') ? old('tax.0'):"0"  }}">
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>{{__('site.total')}}</label>
                    <input type="text" class="form-control" name="total[]" id="total" value="{{ old('totle.0') }}">
                    </select>
                </div>
                
            </div>
        
