<form action="{{ Request::getRequestUri() }}" method="get" class="input-group pull-right"
      style="width: 200px; margin-left: 10px">
    <input type="text" name="search" class="form-control pull-right" placeholder="Search">
    <div class="input-group-btn">
        <button class="btn btn-info"><i
                    class="fa fa-search"></i></button>
    </div>
</form>