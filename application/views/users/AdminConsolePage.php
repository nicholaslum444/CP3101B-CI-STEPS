  <div class="container">
    <div class="row">

      <div class="col-md-6">
       <form role="form">
        <div class="form-group">
          <label for="updates">Updates: </label>
          <textarea class="form-control" rows="5" id="updates" placeholder="Add updates in front page"></textarea>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>

      <form class="form-inline" role="form" id="eventDates">          
        <div class="form-group">
          <label for="eventStartDate">Start of Event</label>
          <input type="date" class="form-control" id="eventStartDate" placeholder="dd/mm/yyyy">
        </div>
        <div class="form-group">
          <label for="cutOffDate">Cut-Off Date</label>
          <input type="date" class="form-control" id="cutOffDate" placeholder="dd/mm/yyyy">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      
      <!-- Data to be fetched -->
      <div class="thumbnail col-md-12">
        <div class="thumbnail col-md-6">
          <h2>Non-Vegans</h2>
          <h2 id="NonVegans"></h2>
        </div>
        <div class="thumbnail col-md-6">
          <h2>Vegans</h2>
          <h2 id="Vegans"></h2>
        </div>
      </div>

    </div><!--End md-6-->

    <div class="col-md-6">
     <div class="panel panel-default">
      <div class="panel-body">
        List of modules generated for Steps
      </div>
      </div>
    </div>

</div>   
