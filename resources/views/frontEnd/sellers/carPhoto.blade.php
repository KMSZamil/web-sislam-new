<h3>Photo Upload</h3>
<div class="row">
    <div class="row">
        <label>{{ __('frontend.CAR_PHOTO') }}</label>
        <div class="col-sm-12">
            @include('dashboard.cars.photoUpload')
        </div>
        <div class=" clear"></div>
    </div>
{{--    <div class="col-sm-8">--}}
{{--        <div class="form-group">--}}
{{--            <label>{{ __('frontend.CAR_PHOTO') }}</label>--}}
{{--            <input type="file" class="form-control" name="car_photo_1" id="car_photo">--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="col-sm-4">--}}
{{--        <div class="form-group" style="padding-top: 31px;">--}}
{{--            <button type="button" class="btn btn-success btn-icon add-more">--}}
{{--                <i data-feather="plus"></i>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>

{{--<div class="after-add-more"></div>--}}
<!--
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>{{ __('frontend.SMART_CARD') }}</label>
            <input type="file" class="form-control" name="smart_card" id="smart_card">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>{{ __('frontend.TAX_TOKEN') }}</label>
            <input type="file" class="form-control" name="tax_token" id="tax_token">
        </div>
    </div>
</div>

<div class="row">                        
    <div class="col-sm-6">
        <div class="form-group">
            <label>{{ __('frontend.FITNESS') }}</label>
            <input type="file" class="form-control" name="fitness" id="fitness">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>{{ __('frontend.BANK_CLEARANCE') }}</label>
            <input type="file" class="form-control" name="bank_clearance" id="bank_clearance">
        </div>
    </div>
</div>
-->
<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade{%=o.options.loadImageFileTypes.test(file.type)?' image':''%}">
    <td>
    <span class="preview"></span>
    </td>
    <td>
    <p class="name">{%=file.name%}</p>
    <strong class="error text-danger"></strong>
    </td>
    <td>
    <p class="size">Processing...</p>
    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
    </td>
    <td>
    {% if (!o.options.autoUpload && o.options.edit && o.options.loadImageFileTypes.test(file.type)) { %}
    <button class="btn btn-success edit" data-index="{%=i%}" disabled>
    <i class="glyphicon glyphicon-edit"></i>
    <span>Edit</span>
    </button>
    {% } %}
    {% if (!i && !o.options.autoUpload) { %}
    <button class="btn btn-primary start" disabled>
    <i class="glyphicon glyphicon-upload"></i>
    <span>Start</span>
    </button>
    {% } %}
    {% if (!i) { %}
    <button class="btn btn-warning cancel">
    <i class="glyphicon glyphicon-ban-circle"></i>
    <span>Cancel</span>
    </button>
    {% } %}
    </td>
    </tr>
    {% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade{%=file.thumbnailUrl?' image':''%}">
    <td>
    <span class="preview">
    {% if (file.thumbnailUrl) { %}
    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
    <input type="hidden" id="custId" name="car_photo[]" value="{%=file.name%}">
    {% } %}
    </span>
    </td>
    <td>
    <p class="name">
    {% if (file.url) { %}
    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
    {% } else { %}
    <span>{%=file.name%}</span>
    {% } %}
    </p>
    {% if (file.error) { %}
    <div><span class="label label-danger">Error</span> {%=file.error%}</div>
    {% } %}
    </td>
    <td>
    <span class="size">{%=o.formatFileSize(file.size)%}</span>
    </td>
    <td>
    {% if (file.deleteUrl) { %}
    <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
    <i class="glyphicon glyphicon-trash"></i>
    <span>Delete</span>
    </button>
    <input type="checkbox" name="delete" value="1" class="toggle">
    {% } else { %}
    <button class="btn btn-warning cancel">
    <i class="glyphicon glyphicon-ban-circle"></i>
    <span>Cancel</span>
    </button>
    {% } %}
    </td>
    </tr>
    {% } %}

    $('#fileupload').fileupload({
    imageCrop: true // Force cropped images
})
</script>