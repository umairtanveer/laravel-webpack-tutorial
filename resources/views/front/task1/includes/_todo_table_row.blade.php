<tr>
    <td>{{ $todo->id }}</td>
    <td>{{ $todo->title }}</td>
    <td>{{ $todo->author }}</td>
    <td>{{ $todo->date }}</td>
    <td>
        <div class="btn-group">
            <button type="button" class="btn btn-primary">Actions</button>
            <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                    data-toggle="dropdown">
                <span class="caret"></span>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:;">View</a>
                <a class="dropdown-item" href="javascript:;">Edit</a>
                <a class="dropdown-item" href="javascript:;">Delete</a>
            </div>
        </div>
    </td>
</tr>
