<!-- Claiming Form -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true" style="padding-top: 70px;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h4 class="title" id="exampleModalLabel">Verification Questions</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(['action' => ['ClaimController@store', $found->id], 'method' => 'POST']) !!}
            <div class="modal-body">
                <p>Please fill in the information below to send a claim request.</p>

                <div class="form-group">
                    <label>Q1: When did you lose your stuff?</label> <br>
                    {{ Form::date('question1') }}
                </div>

                <div class="form-group">
                    <label>Q2: What is the color of this item?</label>
                    {{ Form::select('question2', $colors, null, ['placeholder' => 'Pick a color...', 'class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    <label>Q3: Please describe more detail about this item.</label> <br>
                    {{-- Make sure the information provided is true and accurate to ease the work in verifying ownership
                        by staff. --}}
                    <small>Make sure to provide sufficient and accurate information.</small>
                    {{ Form::textarea('question3', '', ['class' => 'form-control', 'style' => 'max-height: 200px;', 'placeholder' => 'e.g. brand of the item, model/serial number if any']) }}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            {{ Form::hidden('found_id', $found->id) }}
            {!! Form::close() !!}
        </div>
    </div>
</div>
