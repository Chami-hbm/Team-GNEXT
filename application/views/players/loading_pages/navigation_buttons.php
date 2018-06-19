<a class="btn btn-warning btn-lg" style="width: 100%"
   href="<?php echo base_url() . $this->session->userdata('user_type') . '/play-game'; ?>">Play
    Game</a>
<a class="btn btn-warning btn-lg" style="width: 100%"
   href="<?php echo base_url() . $this->session->userdata('user_type') . '/get-analyst'; ?>">Get
    analyst recommendation</a>
<a class="btn btn-warning btn-lg" style="width: 100%"
   href="<?php echo base_url() . $this->session->userdata('user_type') . '/view-bank-balance'; ?>">View
    current bank balance</a>
<a class="btn btn-warning btn-lg" style="width: 100%"
   href="<?php echo base_url() . $this->session->userdata('user_type') . '/view-stock-portfolio'; ?>">View
    current stocks/portfolio</a>
<a class="btn btn-warning btn-lg" style="width: 100%"
   href="<?php echo base_url() . $this->session->userdata('user_type') . '/view-current-historical-price-shares'; ?>">View
    current and historical price and shares</a>