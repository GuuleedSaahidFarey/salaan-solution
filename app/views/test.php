<div class="row">
    <div class="col-sm-12">
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Modal</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .modal-content {
            width: 100%;
            max-width: 800px;
            margin: auto;
        }
        .invoice {
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Button to Open the Modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#invoiceModal">
        View Invoice
    </button>

    <!-- The Modal -->
    <div class="modal fade" id="invoiceModal" tabindex="-1" role="dialog" aria-labelledby="invoiceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="invoiceModalLabel">Invoice</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Invoice Content -->
                    <div class="invoice">
                        <h2>Invoice #12345</h2>
                        <p><strong>Date:</strong> August 3, 2024</p>
                        <p><strong>Bill To:</strong></p>
                        <p>John Doe<br>
                           123 Elm Street<br>
                           Springfield, IL 62701</p>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Item 1</td>
                                    <td>2</td>
                                    <td>$10.00</td>
                                    <td>$20.00</td>
                                </tr>
                                <tr>
                                    <td>Item 2</td>
                                    <td>1</td>
                                    <td>$15.00</td>
                                    <td>$15.00</td>
                                </tr>
                                <!-- Add more items as needed -->
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3" class="text-right">Subtotal</th>
                                    <td>$35.00</td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-right">Tax (10%)</th>
                                    <td>$3.50</td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-right">Total</th>
                                    <td>$38.50</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="printInvoice()">Print</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function printInvoice() {
            const printContent = document.querySelector('.invoice').innerHTML;
            const originalContent = document.body.innerHTML;

            document.body.innerHTML = printContent;
            window.print();
            document.body.innerHTML = originalContent;
            window.location.reload();
        }
    </script

    </div>
</div>