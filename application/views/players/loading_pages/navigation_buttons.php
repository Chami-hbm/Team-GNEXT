<div class="col-sm-12">
    <div class="alert alert-success hide" id="game-over-msg" style="font-size: 17px;text-align: center">
        <strong>GAME OVER !</strong>
    </div>
</div>
<div class="col-sm-12">
    <a class="btn btn-warning btn-lg nav_buttons" style="width: 100%;background-color: #ff4500"
       href="<?php echo base_url() . $this->session->userdata('user_type') . '/play-game'; ?>">Play
        Game</a>
    
</div>
<div class="col-sm-6">
    <a class="btn btn-warning btn-lg nav_buttons" style="width: 100%;background-color: #0066cc"
       href="<?php echo base_url() . $this->session->userdata('user_type') . '/get-analyst-recommendation'; ?>">Get
        <br>Analyst <br>recommendation</a>
    
</div>
<div class="col-sm-6">
    <a class="btn btn-warning btn-lg" style="width: 100%;background-color: #0066cc"
       href="<?php echo base_url() . $this->session->userdata('user_type') . '/view-bank-balance'; ?>">View
        <br>current<br> bank balance</a>
    
</div>
<div class="col-sm-6">
    <a class="btn btn-warning btn-lg" style="width: 100%;background-color: #0066cc"
       href="<?php echo base_url() . $this->session->userdata('user_type') . '/view-stock-portfolio'; ?>">View
        <br>current <br>stocks/portfolio<br></a>
    
</div>
<div class="col-sm-6">
    <a class="btn btn-warning btn-lg" style="width: 100%;background-color: #0066cc"
       href="<?php echo base_url() . $this->session->userdata('user_type') . '/view-current-historical-price-shares'; ?>">View
        current and<br> historical price<br> and shares</a>
    
</div>