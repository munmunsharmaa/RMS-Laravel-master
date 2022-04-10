<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route("delete_category") }}" method="post">
            @csrf

            <div class="modal-body">
                <div class="text-center">
                    <input type="hidden" name="remove_id" id="remove_id">
    
                    <img class="rounded" style="width: 150px;" src="https://pngimg.com/uploads/exclamation_mark/exclamation_mark_PNG32.png" alt="">
                    <h3 class="mt-4">Are you sure?</h3>
                    <p>You won't be able to revert this!</p>
                </div>
            </div>
            <div class="modal-footer" style="justify-content: center;">
                <button type="submit" class="btn btn-primary">Yes, delete it!</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            </div>
            </div>
        </form>
    </div>
</div>