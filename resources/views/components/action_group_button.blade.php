
                    <div class="btn-group" role="group" aria-label="Action button">
                        <form action="{{ $delete }}" method="POST">
                        @csrf @method("DELETE")
                        {{-- <a href="{{ $show }}" type="button" class="btn btn-outline-info btn-sm">{{ ucfirst("show") }}</a> --}}
                        <a href="{{ $edit }}" type="button" class="btn btn-outline-success btn-sm">{{ ucfirst("edit") }}</a>
                        <button type="submit" class="btn btn-outline-danger btn-sm">{{ ucfirst("delete") }}</button>
                        </form>
                    </div>
