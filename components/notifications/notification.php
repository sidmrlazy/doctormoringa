<div class="container">
    <br>

    <div class="row">
        <div class="col-md-9">
            <form action="send-notification.php" method="post" accept-charset="utf-8">

                <div class="form-group">
                    <label for="formGroupExampleInput">Device Type</label>
                    <select class="form-control" id="device_type" name="device_type" required="">
                        <option value="">Select Device type</option>

                        <option value="Android">Android</option>
                        <option value="Iphone">Iphone</option>

                    </select>
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput">Notification Id</label>
                    <input type="text" name="nId" class="form-control" id="formGroupExampleInput"
                        placeholder="Please enter notification id" required="">

                </div>

                <div class="form-group">
                    <button type="submit" id="send_form" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>

    </div>

</div>