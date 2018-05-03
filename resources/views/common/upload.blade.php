<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label for="file" class="col-md-4 control-label">请选择文件</label>
    <div class="col-md-6">
        <input id="file" type="file" class="form-control" name="source">

    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">

        <button type="submit" class="btn btn-primary">
            <i class="fa fa-btn fa-sign-in"></i> 确认上传
        </button>

    </div>
</div>