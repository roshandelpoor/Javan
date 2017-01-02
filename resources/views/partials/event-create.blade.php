<div class="form-group">
	<label for="name" class="control-label col-sm-2">Event Name</label>
	<div class="col-sm-5">
		<input type="text" class="form-control" name="name" id="name" required placeholder="Event Name"
		       value="{{ old('name') }}">
		<span class="help-block text-primary">Event name</span>
	</div>
</div>

<div class="form-group">
	<label for="description" class="control-label col-sm-2">Description</label>
	<div class="col-sm-5">
		<textarea name="description" class="form-control" id="description" rows="5" required
		          placeholder="Description">{{ old('description') }}</textarea>
		<span class="help-block text-primary">Event description</span>
	</div>
</div>

<div class="form-group">
	<label for="capacity" class="control-label col-sm-2">Capacity</label>
	<div class="col-sm-5">
		<input type="number" class="form-control" name="capacity" id="capacity" placeholder="Capacity"
		       value="{{ old('capacity') }}" min="1" max="80" required>
		<span class="help-block text-primary">Event total seat capacity</span>
	</div>
</div>

<div class="form-group">
	<label for="price" class="control-label col-sm-2">Price</label>
	<div class="col-sm-5">
		<input type="number" class="form-control" name="price" id="price" placeholder="Price x 100" required
		       value="{{ old('price') }}">
		<span class="help-block text-primary">Event price times 100 for example £30.00 MUST be entered 3000</span>
	</div>
</div>

<div class="form-group">
	<label for="start" class="control-label col-sm-2">Start</label>
	<div class="col-sm-5">
		<input class="form-control" type="text" name="start" id="start" placeholder="YYY-MM-DD HH:MM:SS"
		       value="{{ date('Y-m-d H:i:s') }}" pattern="[0-9:\-\s]+" required>
		<span class="help-block text-primary">Event start date format YYY-MM-DD HH:MM:SS</span>
	</div>
</div>

<div class="form-group">
	<label for="finish" class="control-label col-sm-2">Finish</label>
	<div class="col-sm-5">
		<input class="form-control" type="text" name="finish" id="finish" placeholder="YYY-MM-DD HH:MM:SS"
		       value="{{ date('Y-m-d H:i:s') }}" pattern="[0-9:\-\s]+" required>
		<span class="help-block text-primary">Event finish date format YYY-MM-DD HH:MM:SS</span>
	</div>
</div>

<div class="form-group">
	<label for="active" class="control-label col-sm-2"></label>
	<div class="togglebutton">
		<label>
			<input type="hidden" name="active" value="0">
			<input name="active" id="active" type="checkbox" value="1">
			<label class="control-label">Active ?</label>
		</label>
	</div>
</div>

<div class="col-sm-offset-2">
	<button type="submit" class="btn btn-raised btn-primary">
		<i class="fa fa-pencil-square-o fa-lg"></i>
		Create
	</button>
</div>