
<div class="fileupload-buttonbar">
    <div class="col-lg-8">
        <!-- The fileinput-button span is used to style the file input field as button -->
        <span class="btn btn-success fileinput-button" style="float: left;">
            <i class="glyphicon glyphicon-plus"></i>
            <span>Add files...</span>
            <input type="file" name="files[]" multiple />
        </span>
        <button type="submit" class="btn btn-primary start" style="float: left; margin: 0 5px; border-radius: 0.25erm; box-shadow: unset;">
            <i class="glyphicon glyphicon-upload"></i>
            <span>Start upload</span>
        </button>
    <!--        <button type="reset" class="btn btn-warning cancel">-->
    <!--            <i class="glyphicon glyphicon-ban-circle"></i>-->
    <!--            <span>Cancel upload</span>-->
    <!--        </button>-->
    <!--        <button type="button" class="btn btn-danger delete">-->
    <!--            <i class="glyphicon glyphicon-trash"></i>-->
    <!--            <span>Delete selected</span>-->
    <!--        </button>-->
        <input type="checkbox" class="toggle" />
        <!-- The global file processing state -->
        <span class="fileupload-process"></span>
    </div>
    <!-- The global progress state -->
    <div class="col-lg-4 fileupload-progress fade">
        <!-- The global progress bar -->
        <div
            class="progress progress-striped active"
            role="progressbar"
            aria-valuemin="0"
            aria-valuemax="100"
            >
            <div
                class="progress-bar progress-bar-success"
                style="width: 0%;"
                ></div>
        </div>
        <!-- The extended global progress state -->
        <div class="progress-extended">&nbsp;</div>
    </div>
</div>
<!-- The table listing the files available for upload/download -->
<table role="presentation" class="table table-striped">
    <tbody class="files"></tbody>
</table>
<!--</form>-->
<div
    id="blueimp-gallery"
    class="blueimp-gallery blueimp-gallery-controls"
    aria-label="image gallery"
    aria-modal="true"
    role="dialog"
    data-filter=":even"
    >
    <div class="slides" aria-live="polite"></div>
    <h3 class="title"></h3>
    <a
        class="prev"
        aria-controls="blueimp-gallery"
        aria-label="previous slide"
        aria-keyshortcuts="ArrowLeft"
        ></a>
    <a
        class="next"
        aria-controls="blueimp-gallery"
        aria-label="next slide"
        aria-keyshortcuts="ArrowRight"
        ></a>
    <a
        class="close"
        aria-controls="blueimp-gallery"
        aria-label="close"
        aria-keyshortcuts="Escape"
        ></a>
    <a
        class="play-pause"
        aria-controls="blueimp-gallery"
        aria-label="play slideshow"
        aria-keyshortcuts="Space"
        aria-pressed="false"
        role="button"
        ></a>
    <ol class="indicator"></ol>
</div>
