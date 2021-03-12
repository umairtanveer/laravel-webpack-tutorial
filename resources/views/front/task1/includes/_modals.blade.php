<!-- The Modal -->
<div class="modal" id="createTodoForm">
    <div class="modal-dialog modal-lg">
        <form action="{{ url('task1/ajax/todo/create') }}" method="post" id="create_todo">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Create Todo') }}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">{{ __('Title') }}</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="author">{{ __('Author Name') }}</label>
                        <input type="text" class="form-control" name="author" value="{{ old('author') }}">
                    </div>
                    <div class="form-group">
                        <label for="date">{{ __('Date') }}</label>
                        <input type="date" class="form-control" name="date" value="{{ old('date') }}">
                    </div>
                    <div class="form-group">
                        <label for="list">{{ __('List') }}</label>
                        <textarea name="list" class="form-control" cols="30" rows="10">{{ old('list') }}</textarea>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" id="submit_btn" class="btn btn-success">{{ __('Submit') }}</button>
                    <button type="button" id="processing_btn" style="display: none" class="btn btn-primary disabled">{{ __('Processing...') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
