@php($routePrefix = strtolower(class_basename($model)))

<form method="POST" class="btn-group btn-group-xs text-nowrap" action="{{ route($routePrefix.'.destroy', $model->id) }}">
    <a class="btn btn-default" title="Edit" href="{{ route($routePrefix.'.edit', $model->id) }}">
        <i class="fa fa-edit"></i>
    </a>
    {{ csrf_field() }}
    <input name="_method" type="hidden" value="DELETE">
    <button type="submit" title="Delete" class="btn btn-danger" v-confirm-delete>
        <i class="fa fa-trash"></i>
    </button>
</form>
