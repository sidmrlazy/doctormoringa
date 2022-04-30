<div class="row">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Trading</h4>
                <div class="flex-shrink-0">
                    <ul class="nav nav-tabs-custom card-header-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#buy-tab" role="tab">Buy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#sell-tab" role="tab">Sell</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- end card header -->

            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="buy-tab" role="tabpanel">
                        <div class="float-end ms-2">
                            <h5 class="font-size-14">
                                <i class="bx bx-wallet text-primary font-size-16 align-middle me-1"></i>
                                <a href="#!" class="text-reset text-decoration-underline">$4335.23</a>
                            </h5>
                        </div>
                        <h5 class="font-size-14 mb-4">Buy Coins</h5>
                        <div>
                            <div class="form-group mb-3">
                                <label>Payment method :</label>
                                <select class="form-select">
                                    <option>Direct Bank Payment</option>
                                    <option>Credit / Debit Card</option>
                                    <option>Paypal</option>
                                    <option>Payoneer</option>
                                    <option>Stripe</option>
                                </select>
                            </div>

                            <div>
                                <label>Add Amount :</label>
                                <div class="input-group mb-3">
                                    <label class="input-group-text">Amount</label>
                                    <select class="form-select" style="max-width: 90px">
                                        <option value="BT" selected>BTC</option>
                                        <option value="ET">ETH</option>
                                        <option value="LT">LTC</option>
                                    </select>
                                    <input type="text" class="form-control" placeholder="0.00121255" />
                                </div>

                                <div class="input-group mb-3">
                                    <label class="input-group-text">Price</label>
                                    <input type="text" class="form-control" placeholder="$58,245" />
                                    <label class="input-group-text">$</label>
                                </div>

                                <div class="input-group mb-3">
                                    <label class="input-group-text">Total</label>
                                    <input type="text" class="form-control" placeholder="$36,854.25" />
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="button" class="btn btn-success w-md">
                                    Buy Coin
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- end tab pane -->
                    <div class="tab-pane" id="sell-tab" role="tabpanel">
                        <div class="float-end ms-2">
                            <h5 class="font-size-14">
                                <i class="bx bx-wallet text-primary font-size-16 align-middle me-1"></i>
                                <a href="#!" class="text-reset text-decoration-underline">$4235.23</a>
                            </h5>
                        </div>
                        <h5 class="font-size-14 mb-4">Sell Coins</h5>

                        <div>
                            <div class="form-group mb-3">
                                <label>Wallet ID :</label>
                                <input type="email" class="form-control" placeholder="1cvb254ugxvfcd280ki" />
                            </div>

                            <div>
                                <label>Add Amount :</label>
                                <div class="input-group mb-3">
                                    <label class="input-group-text">Amount</label>

                                    <select class="form-select" style="max-width: 90px">
                                        <option value="BT" selected>BTC</option>
                                        <option value="ET">ETH</option>
                                        <option value="LT">LTC</option>
                                    </select>
                                    <input type="text" class="form-control" placeholder="0.00121255" />
                                </div>

                                <div class="input-group mb-3">
                                    <label class="input-group-text">Price</label>

                                    <input type="text" class="form-control" placeholder="$23,754.25" />

                                    <label class="input-group-text">$</label>
                                </div>

                                <div class="input-group mb-3">
                                    <label class="input-group-text">Total</label>
                                    <input type="text" class="form-control" placeholder="$6,852.41" />
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="button" class="btn btn-danger w-md">
                                    Sell Coin
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- end tab pane -->
                </div>
                <!-- end tab content -->
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->

    <div class="col-xl-4">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Transactions</h4>
                <div class="flex-shrink-0">
                    <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#transactions-all-tab" role="tab">
                                All
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#transactions-buy-tab" role="tab">
                                Buy
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#transactions-sell-tab" role="tab">
                                Sell
                            </a>
                        </li>
                    </ul>
                    <!-- end nav tabs -->
                </div>
            </div>
            <!-- end card header -->

            <div class="card-body px-0">
                <div class="tab-content">
                    <div class="tab-pane active" id="transactions-all-tab" role="tabpanel">
                        <div class="table-responsive px-3" data-simplebar style="max-height: 352px">
                            <table class="table align-middle table-nowrap table-borderless">
                                <tbody>
                                    <tr>
                                        <td style="width: 50px">
                                            <div class="font-size-22 text-success">
                                                <i class="bx bx-down-arrow-circle d-block"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Buy BTC</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    14 Mar, 2021
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">0.016 BTC</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Coin Value
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">
                                                    $125.20
                                                </h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Amount
                                                </p>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="font-size-22 text-danger">
                                                <i class="bx bx-up-arrow-circle d-block"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Sell ETH</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    15 Mar, 2021
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">0.56 ETH</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Coin Value
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">
                                                    $112.34
                                                </h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Amount
                                                </p>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="font-size-22 text-success">
                                                <i class="bx bx-down-arrow-circle d-block"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Buy LTC</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    16 Mar, 2021
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">1.88 LTC</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Coin Value
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">
                                                    $94.22
                                                </h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Amount
                                                </p>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="font-size-22 text-success">
                                                <i class="bx bx-down-arrow-circle d-block"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Buy ETH</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    17 Mar, 2021
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">0.42 ETH</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Coin Value
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">
                                                    $84.32
                                                </h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Amount
                                                </p>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="font-size-22 text-danger">
                                                <i class="bx bx-up-arrow-circle d-block"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Sell BTC</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    18 Mar, 2021
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">0.018 BTC</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Coin Value
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">
                                                    $145.80
                                                </h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Amount
                                                </p>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="width: 50px">
                                            <div class="font-size-22 text-success">
                                                <i class="bx bx-down-arrow-circle d-block"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Buy BTC</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    14 Mar, 2021
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">0.016 BTC</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Coin Value
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">
                                                    $125.20
                                                </h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Amount
                                                </p>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="font-size-22 text-danger">
                                                <i class="bx bx-up-arrow-circle d-block"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Sell ETH</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    15 Mar, 2021
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">0.56 ETH</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Coin Value
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">
                                                    $112.34
                                                </h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Amount
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end tab pane -->
                    <div class="tab-pane" id="transactions-buy-tab" role="tabpanel">
                        <div class="table-responsive px-3" data-simplebar style="max-height: 352px">
                            <table class="table align-middle table-nowrap table-borderless">
                                <tbody>
                                    <tr>
                                        <td style="width: 50px">
                                            <div class="font-size-22 text-success">
                                                <i class="bx bx-down-arrow-circle d-block"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Buy BTC</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    14 Mar, 2021
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">0.016 BTC</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Coin Value
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">
                                                    $125.20
                                                </h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Amount
                                                </p>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="font-size-22 text-success">
                                                <i class="bx bx-down-arrow-circle d-block"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Buy BTC</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    18 Mar, 2021
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">0.018 BTC</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Coin Value
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">
                                                    $145.80
                                                </h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Amount
                                                </p>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="font-size-22 text-success">
                                                <i class="bx bx-down-arrow-circle d-block"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Buy LTC</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    16 Mar, 2021
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">1.88 LTC</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Coin Value
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">
                                                    $94.22
                                                </h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Amount
                                                </p>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="font-size-22 text-success">
                                                <i class="bx bx-down-arrow-circle d-block"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Buy ETH</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    15 Mar, 2021
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">0.56 ETH</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Coin Value
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">
                                                    $112.34
                                                </h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Amount
                                                </p>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="font-size-22 text-success">
                                                <i class="bx bx-down-arrow-circle d-block"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Buy ETH</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    17 Mar, 2021
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">0.42 ETH</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Coin Value
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">
                                                    $84.32
                                                </h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Amount
                                                </p>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="font-size-22 text-success">
                                                <i class="bx bx-down-arrow-circle d-block"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Buy ETH</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    15 Mar, 2021
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">0.56 ETH</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Coin Value
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">
                                                    $112.34
                                                </h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Amount
                                                </p>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="width: 50px">
                                            <div class="font-size-22 text-success">
                                                <i class="bx bx-down-arrow-circle d-block"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Buy BTC</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    14 Mar, 2021
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">0.016 BTC</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Coin Value
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">
                                                    $125.20
                                                </h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Amount
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end tab pane -->
                    <div class="tab-pane" id="transactions-sell-tab" role="tabpanel">
                        <div class="table-responsive px-3" data-simplebar style="max-height: 352px">
                            <table class="table align-middle table-nowrap table-borderless">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="font-size-22 text-danger">
                                                <i class="bx bx-up-arrow-circle d-block"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Sell ETH</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    15 Mar, 2021
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">0.56 ETH</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Coin Value
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">
                                                    $112.34
                                                </h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Amount
                                                </p>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="width: 50px">
                                            <div class="font-size-22 text-danger">
                                                <i class="bx bx-up-arrow-circle d-block"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Sell BTC</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    14 Mar, 2021
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">0.016 BTC</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Coin Value
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">
                                                    $125.20
                                                </h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Amount
                                                </p>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="font-size-22 text-danger">
                                                <i class="bx bx-up-arrow-circle d-block"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Sell BTC</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    18 Mar, 2021
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">0.018 BTC</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Coin Value
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">
                                                    $145.80
                                                </h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Amount
                                                </p>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="font-size-22 text-danger">
                                                <i class="bx bx-up-arrow-circle d-block"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Sell ETH</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    15 Mar, 2021
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">0.56 ETH</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Coin Value
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">
                                                    $112.34
                                                </h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Amount
                                                </p>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="font-size-22 text-danger">
                                                <i class="bx bx-up-arrow-circle d-block"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Sell LTC</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    16 Mar, 2021
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">1.88 LTC</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Coin Value
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">
                                                    $94.22
                                                </h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Amount
                                                </p>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="font-size-22 text-danger">
                                                <i class="bx bx-up-arrow-circle d-block"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Sell ETH</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    17 Mar, 2021
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">0.42 ETH</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Coin Value
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">
                                                    $84.32
                                                </h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Amount
                                                </p>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="width: 50px">
                                            <div class="font-size-22 text-danger">
                                                <i class="bx bx-up-arrow-circle d-block"></i>
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">Sell BTC</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    14 Mar, 2021
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 mb-0">0.016 BTC</h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Coin Value
                                                </p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">
                                                    $125.20
                                                </h5>
                                                <p class="text-muted mb-0 font-size-12">
                                                    Amount
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end tab pane -->
                </div>
                <!-- end tab content -->
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->

    <div class="col-xl-4">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Recent Activity</h4>
                <div class="flex-shrink-0">
                    <select class="form-select form-select-sm mb-0 my-n1">
                        <option value="Today" selected="">Today</option>
                        <option value="Yesterday">Yesterday</option>
                        <option value="Week">Last Week</option>
                        <option value="Month">Last Month</option>
                    </select>
                </div>
            </div>
            <!-- end card header -->

            <div class="card-body px-0">
                <div class="px-3" data-simplebar style="max-height: 352px">
                    <ul class="list-unstyled activity-wid mb-0">
                        <li class="activity-list activity-border">
                            <div class="activity-icon avatar-md">
                                <span class="avatar-title bg-soft-warning text-warning rounded-circle">
                                    <i class="bx bx-bitcoin font-size-24"></i>
                                </span>
                            </div>
                            <div class="timeline-list-item">
                                <div class="d-flex">
                                    <div class="flex-grow-1 overflow-hidden me-4">
                                        <h5 class="font-size-14 mb-1">
                                            24/05/2021, 18:24:56
                                        </h5>
                                        <p class="text-truncate text-muted font-size-13">
                                            0xb77ad0099e21d4fca87fa4ca92dda1a40af9e05d205e53f38bf026196fa2e431
                                        </p>
                                    </div>
                                    <div class="flex-shrink-0 text-end me-3">
                                        <h6 class="mb-1">+0.5 BTC</h6>
                                        <div class="font-size-13">$178.53</div>
                                    </div>

                                    <div class="flex-shrink-0 text-end">
                                        <div class="dropdown">
                                            <a class="text-muted dropdown-toggle font-size-24" role="button"
                                                data-bs-toggle="dropdown" aria-haspopup="true">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else
                                                    here</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="activity-list activity-border">
                            <div class="activity-icon avatar-md">
                                <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                    <i class="mdi mdi-ethereum font-size-24"></i>
                                </span>
                            </div>
                            <div class="timeline-list-item">
                                <div class="d-flex">
                                    <div class="flex-grow-1 overflow-hidden me-4">
                                        <h5 class="font-size-14 mb-1">
                                            24/05/2021, 18:24:56
                                        </h5>
                                        <p class="text-truncate text-muted font-size-13">
                                            0xb77ad0099e21d4fca87fa4ca92dda1a40af9e05d205e53f38bf026196fa2e431
                                        </p>
                                    </div>
                                    <div class="flex-shrink-0 text-end me-3">
                                        <h6 class="mb-1">-20.5 ETH</h6>
                                        <div class="font-size-13">$3541.45</div>
                                    </div>

                                    <div class="flex-shrink-0 text-end">
                                        <div class="dropdown">
                                            <a class="text-muted dropdown-toggle font-size-24" role="button"
                                                data-bs-toggle="dropdown" aria-haspopup="true">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else
                                                    here</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="activity-list activity-border">
                            <div class="activity-icon avatar-md">
                                <span class="avatar-title bg-soft-warning text-warning rounded-circle">
                                    <i class="bx bx-bitcoin font-size-24"></i>
                                </span>
                            </div>
                            <div class="timeline-list-item">
                                <div class="d-flex">
                                    <div class="flex-grow-1 overflow-hidden me-4">
                                        <h5 class="font-size-14 mb-1">
                                            24/05/2021, 18:24:56
                                        </h5>
                                        <p class="text-truncate text-muted font-size-13">
                                            0xb77ad0099e21d4fca87fa4ca92dda1a40af9e05d205e53f38bf026196fa2e431
                                        </p>
                                    </div>
                                    <div class="flex-shrink-0 text-end me-3">
                                        <h6 class="mb-1">+0.5 BTC</h6>
                                        <div class="font-size-13">$5791.45</div>
                                    </div>

                                    <div class="flex-shrink-0 text-end">
                                        <div class="dropdown">
                                            <a class="text-muted dropdown-toggle font-size-24" role="button"
                                                data-bs-toggle="dropdown" aria-haspopup="true">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else
                                                    here</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="activity-list activity-border">
                            <div class="activity-icon avatar-md">
                                <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                    <i class="mdi mdi-litecoin font-size-24"></i>
                                </span>
                            </div>
                            <div class="timeline-list-item">
                                <div class="d-flex">
                                    <div class="flex-grow-1 overflow-hidden me-4">
                                        <h5 class="font-size-14 mb-1">
                                            24/05/2021, 18:24:56
                                        </h5>
                                        <p class="text-truncate text-muted font-size-13">
                                            0xb77ad0099e21d4fca87fa4ca92dda1a40af9e05d205e53f38bf026196fa2e431
                                        </p>
                                    </div>
                                    <div class="flex-shrink-0 text-end me-3">
                                        <h6 class="mb-1">-1.5 LTC</h6>
                                        <div class="font-size-13">$5791.45</div>
                                    </div>

                                    <div class="flex-shrink-0 text-end">
                                        <div class="dropdown">
                                            <a class="text-muted dropdown-toggle font-size-24" role="button"
                                                data-bs-toggle="dropdown" aria-haspopup="true">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else
                                                    here</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="activity-list activity-border">
                            <div class="activity-icon avatar-md">
                                <span class="avatar-title bg-soft-warning text-warning rounded-circle">
                                    <i class="bx bx-bitcoin font-size-24"></i>
                                </span>
                            </div>
                            <div class="timeline-list-item">
                                <div class="d-flex">
                                    <div class="flex-grow-1 overflow-hidden me-4">
                                        <h5 class="font-size-14 mb-1">
                                            24/05/2021, 18:24:56
                                        </h5>
                                        <p class="text-truncate text-muted font-size-13">
                                            0xb77ad0099e21d4fca87fa4ca92dda1a40af9e05d205e53f38bf026196fa2e431
                                        </p>
                                    </div>
                                    <div class="flex-shrink-0 text-end me-3">
                                        <h6 class="mb-1">+0.5 BTC</h6>
                                        <div class="font-size-13">$5791.45</div>
                                    </div>

                                    <div class="flex-shrink-0 text-end">
                                        <div class="dropdown">
                                            <a class="text-muted dropdown-toggle font-size-24" role="button"
                                                data-bs-toggle="dropdown" aria-haspopup="true">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else
                                                    here</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="activity-list">
                            <div class="activity-icon avatar-md">
                                <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                    <i class="mdi mdi-litecoin font-size-24"></i>
                                </span>
                            </div>
                            <div class="timeline-list-item">
                                <div class="d-flex">
                                    <div class="flex-grow-1 overflow-hidden me-4">
                                        <h5 class="font-size-14 mb-1">
                                            24/05/2021, 18:24:56
                                        </h5>
                                        <p class="text-truncate text-muted font-size-13">
                                            0xb77ad0099e21d4fca87fa4ca92dda1a40af9e05d205e53f38bf026196fa2e431
                                        </p>
                                    </div>
                                    <div class="flex-shrink-0 text-end me-3">
                                        <h6 class="mb-1">+.55 LTC</h6>
                                        <div class="font-size-13">$91.45</div>
                                    </div>

                                    <div class="flex-shrink-0 text-end">
                                        <div class="dropdown">
                                            <a class="text-muted dropdown-toggle font-size-24" role="button"
                                                data-bs-toggle="dropdown" aria-haspopup="true">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else
                                                    here</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->