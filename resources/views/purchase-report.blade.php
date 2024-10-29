<!doctype html>

<html
  lang="en"
  class="light-style layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
  data-style="light">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    @include('layouts.head')
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        @include('layouts.main-sidebar')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          @include('layouts.main-header')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-xxl-8 mb-6 order-0">
                  <div class="card">
                    <div class="d-flex align-items-start row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary mb-3">POS system 🎉</h5>
                          <p class="mb-6">
                            You have done 72% more sales today.<br />Check your new badge in your profile.
                          </p>

                          <!-- <a href="javascript:;" class="btn btn-sm btn-outline-primary">Add Purchase</a> -->
                          <!--  Purchase Button -->
                          <a href="javascript:;" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addPurchaseModal">Add Purchase</a>

                          <!-- Modal for Add Purchase -->
                          <div class="modal fade" id="addPurchaseModal" tabindex="-1" aria-labelledby="addPurchaseModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="addPurchaseModalLabel">Add New Purchase</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                          <form id="addPurchaseForm" action="{{ route('purchase.store') }}" method="POST">
                                              @csrf
                                              <div class="mb-3">
                                                  <label for="product_id" class="form-label">Product ID</label>
                                                  <!-- <input type="text" class="form-control" id="product_id" name="product_id" required> -->
                                                  <select class="form-select" id="product_id" name="product_id" required>
                                                    <option value="">Select a product</option>
                                                    @foreach($products as $product)
                                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                    @endforeach
                                                  </select>
                                                </div>
                                              <div class="mb-3">
                                                  <label for="quantity" class="form-label">Quantity</label>
                                                  <input type="number" class="form-control" id="quantity" name="quantity" required min="1">
                                              </div>
                                              <div class="mb-3">
                                                  <label for="amount" class="form-label">Amount</label>
                                                  <input type="number" class="form-control" id="amount" name="amount" required step="0.01" min="0">
                                              </div>
                                              <div class="mb-3">
                                                  <label for="type" class="form-label">Type</label>
                                                  <select class="form-select" id="type" name="type" required>
                                                      <option value="purchase">Purchase</option>
                                                      <option value="purchase_return">Purchase Return</option>
                                                  </select>
                                              </div>
                                              <button type="submit" class="btn btn-primary">Add Purchase</button>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <a href="javascript:;" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#addProductModal">Add Product</a>
                          <!-- Modal for Add Product -->
                          <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                          <form id="addProductForm" action="{{ route('product.store') }}" method="POST">
                                              @csrf
                                              <div class="mb-3">
                                                  <label for="product_name" class="form-label">Product Name</label>
                                                  <input type="text" class="form-control" id="product_name" name="name" required>
                                              </div>
                                              <div class="mb-3">
                                                  <label for="product_price" class="form-label">Product Price</label>
                                                  <input type="number" class="form-control" id="product_price" name="price" required step="0.01" min="0">
                                              </div>
                                              <div class="mb-3">
                                                  <label for="product_stock" class="form-label">Product Stock</label>
                                                  <input type="number" class="form-control" id="product_stock" name="stock" required min="0">
                                              </div>
                                              <button type="submit" class="btn btn-primary">Add Product</button>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-6">
                          <img
                            src="../assets/img/illustrations/man-with-laptop.png"
                            height="175"
                            class="scaleX-n1-rtl"
                            alt="View Badge User" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Total Revenue -->
                <div class="col-12 col-xxl-8 order-2 order-md-3 order-xxl-2 mb-6">
                    <div class="card">
                        <div class="row row-bordered g-0">
                            <div class="col-lg-8">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <div class="card-title mb-0">
                                        <h5 class="m-0 me-2">Purchase Trends Data</h5>
                                    </div>
                                    <div class="dropdown">
                                        <button
                                            class="btn p-0"
                                            type="button"
                                            id="totalRevenue"
                                            data-bs-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded bx-lg text-muted"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="totalRevenue">
                                            <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Share</a>
                                        </div>
                                    </div>
                                </div>
                                <div id="totalRevenueChart" class="px-3">
                                    <canvas id="purchaseTrendsChart"></canvas>
                                </div>
                            </div>
                            <div class="col-lg-4 d-flex align-items-center">
                                <div class="card-body px-xl-9">
                                    <!-- Optional Dropdown for Year Selection -->
                                    <div class="text-center mb-6">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-outline-primary">
                                                <script>
                                                    document.write(new Date().getFullYear() - 1);
                                                </script>
                                            </button>
                                            <button
                                                type="button"
                                                class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split"
                                                data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <span class="visually-hidden">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="javascript:void(0);">2021</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">2020</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">2019</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    
                    const purchaseTrendsData = @json($purchaseTrendsData);

                    
                    const labels = purchaseTrendsData.map(trend => trend.date);
                    const data = purchaseTrendsData.map(trend => parseFloat(trend.total));

                    
                    const ctx = document.getElementById('purchaseTrendsChart').getContext('2d');
                    const purchaseTrendsChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Total Purchases',
                                data: data,
                                backgroundColor: 'rgba(75, 192, 192, 0.5)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    title: {
                                        display: true,
                                        text: 'Total Amount ($)'
                                    }
                                },
                                x: {
                                    title: {
                                        display: true,
                                        text: 'Date'
                                    }
                                }
                            }
                        }
                    });
                </script>

                <!--/ Total Revenue -->
                <div class="col-12 col-md-8 col-lg-12 col-xxl-4 order-3 order-md-2">
                  <div class="row">
                    <div class="col-6 mb-6">
                      <div class="card h-100">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between mb-4">
                            <div class="avatar flex-shrink-0">
                              <img src="../assets/img/icons/unicons/paypal.png" alt="paypal" class="rounded" />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt4"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded text-muted"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                              </div>
                            </div>
                          </div>
                          <p class="mb-1">Total Purchases</p>
                          <h4 class="card-title mb-3">{{ number_format($totalPurchases, 2) }}</h4>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 mb-6">
                      <div class="card h-100">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between mb-4">
                            <div class="avatar flex-shrink-0">
                              <img src="../assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt1"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded text-muted"></i>
                              </button>
                              <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                              </div>
                            </div>
                          </div>
                          <p class="mb-1">Purchase Return</p>
                          <h4 class="card-title mb-3">{{ number_format($purchaseReturns, 2) }}</h4>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 mb-6">
                      <div class="card h-100">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between mb-4">
                            <div class="avatar flex-shrink-0">
                              <img src="../assets/img/icons/unicons/paypal.png" alt="paypal" class="rounded" />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt4"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded text-muted"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                              </div>
                            </div>
                          </div>
                          <p class="mb-1">Current Stock</p>
                          <h4 class="card-title mb-3">{{ number_format($currentStock, 0) }}</h4>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 mb-6">
                      <div class="card h-100">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between mb-4">
                            <div class="avatar flex-shrink-0">
                              <img src="../assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt1"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded text-muted"></i>
                              </button>
                              <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                              </div>
                            </div>
                          </div>
                          <p class="mb-1">Purchase TrendsData</p>
                          <ul class="mb-3">
                            @foreach ($purchaseTrendsData as $trend)
                              <li>{{ $trend['date'] }}: {{ number_format($trend['total'], 2) }}</li>
                            @endforeach
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                  <div class="card-body">
                      <h5 class="card-title">Purchase History</h5>
                      <div class="table-responsive">
                          <table class="table">
                              <thead>
                                  <tr>
                                      <th>Product Name</th>
                                      <th>Transaction Type</th>
                                      <th>Quantity</th>
                                      <th>Amount</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($purchaseHistory as $purchase)
                                      <tr>
                                          <td>{{ $purchase['product_name'] }}</td>
                                          <td>{{ $purchase['type'] }}</td>
                                          <td>{{ $purchase['quantity'] }}</td>
                                          <td>{{ number_format($purchase['amount'], 2) }}</td>
                                      </tr>
                                  @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
            </div>
            <!-- / Content -->

            @include('layouts.footer')

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <div class="buy-now">
      <a
        href="https://themeselection.com/item/sneat-dashboard-pro-bootstrap/"
        target="_blank"
        class="btn btn-danger btn-buy-now"
        >Upgrade to Pro</a
      >
    </div>

    @include('layouts.footer-scripts')
  </body>
</html>
