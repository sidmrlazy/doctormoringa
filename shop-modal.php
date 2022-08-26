  <!-- Product Details Modal Start -->
  <?php
    include('admin/includes/server/config.php');
    if (isset($_POST['read_more'])) {
        $cart_item_id = $_POST['item_id'];
        $fetch_product_details_query = "SELECT * FROM items WHERE item_id = $cart_item_id";
        $product_details_result = mysqli_query($connection, $fetch_product_details_query);

        while ($row = mysqli_fetch_array($product_details_result)) {
            $item_category = $row['item_category'];
            $item_image = "admin/assets/images/products/" . $row['item_image'];
            $item_name = $row['item_name'];
            $item_id = $row['item_id'];
            $item_ingredients = $row['item_ingredients'];
            $item_description = $row['item_description'];
            $item_usage = $row['item_usage'];
            $item_benefits = $row['item_benefits'];
            $item_weight = $row['item_weight'];
            $item_price = $row['item_price'];
        } ?>

  <!-- Product Details Modal Start -->
  <div class="modal" id="productModal" tabindex="-1">
      <div class="modal-dialog modal-xl">
          <div class="modal-content ">
              <div class="modal-header">
                  <p>Product ID: <?php echo $item_id; ?> </p>
                  <a href="shop" class="btn-close" aria-label="Close"></a>
              </div>
              <div class="modal-body">
                  <div class="product-card-xl">
                      <div class="product-card-xl-img col-md-4">
                          <img src="<?php echo $item_image; ?>" alt="<?php echo $item_name; ?>">
                      </div>
                      <div class="col-md-6">
                          <p class="product-cat-xl"><?php echo $item_category; ?></p>
                          <h1 class="product-name-xl"><?php echo $item_name; ?></h1>
                          <p class="product-weight-xl">Weight: <?php echo $item_weight; ?></p>

                          <p class="product-price-xl"> ₹<?php echo $item_price; ?></p>

                          <!-- Inner Nav -->
                          <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
                              <li class="nav-item tab-item" role="presentation">
                                  <button class="nav-link  active" id="ingredients-tab" data-bs-toggle="tab"
                                      data-bs-target="#ingredients" type="button" role="tab" aria-controls="ingredients"
                                      aria-selected="true">Ingredients</button>
                              </li>
                              <li class="nav-item tab-item" role="presentation">
                                  <button class="nav-link " id="description-tab" data-bs-toggle="tab"
                                      data-bs-target="#description" type="button" role="tab" aria-controls="description"
                                      aria-selected="false">Description</button>
                              </li>
                              <li class="nav-item tab-item" role="presentation">
                                  <button class="nav-link " id="benefits-tab" data-bs-toggle="tab"
                                      data-bs-target="#benefits" type="button" role="tab" aria-controls="benefits"
                                      aria-selected="false">Benefits</button>
                              </li>
                              <li class="nav-item tab-item" role="presentation">
                                  <button class="nav-link " id="usage-tab" data-bs-toggle="tab" data-bs-target="#usage"
                                      type="button" role="tab" aria-controls="usage"
                                      aria-selected="false">Usage</button>
                              </li>
                          </ul>
                          <div class="tab-content" id="myTabContent">

                              <div class="tab-pane fade show active" id="ingredients" role="tabpanel"
                                  aria-labelledby="ingredients-tab">
                                  <div class="accordion-body">
                                      <div class="w-100 custom-card">
                                          <p><?php echo $item_ingredients; ?></p>
                                      </div>
                                  </div>
                              </div>
                              <div class="tab-pane fade show " id="description" role="tabpanel"
                                  aria-labelledby="description-tab">
                                  <div class="accordion-body">
                                      <div class="w-100 custom-card">
                                          <p><?php echo $item_description; ?></p>
                                      </div>
                                  </div>
                              </div>

                              <div class="tab-pane fade show " id="benefits" role="tabpanel"
                                  aria-labelledby="benefits-tab">
                                  <div class="accordion-body">
                                      <div class="w-100 custom-card">
                                          <p><?php echo $item_benefits; ?></p>
                                      </div>
                                  </div>
                              </div>

                              <div class="tab-pane fade show " id="usage" role="tabpanel" aria-labelledby="usage-tab">
                                  <div class="accordion-body">
                                      <div class="w-100 custom-card">
                                          <p><?php echo $item_usage; ?></p>
                                      </div>
                                  </div>
                              </div>

                          </div>
                          <!-- Inner Nav -->
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <?php
        echo "<script type='text/javascript'>
    $(document).ready(function() {
        $('#productModal').modal('show');
    });
    </script>";
    }
    ?>
  <!-- Product Details Modal End -->