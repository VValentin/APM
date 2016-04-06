{% extends "layouts\base_dashboard.volt" %}

{% block content %}
        <div class="container">
            <div class="jumbotron">
                <h1>Addresses</h1>
                <p>Manage your addresses</p>
                {% if addresses_available %}
                    <p><table id="addresses" class="display compact" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>City</th>
                                <th>Street</th>
                                <th>Number</th>
                                <th>Building</th>
                                <th>Entrance</th>
                                <th>Apartment</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table></p>
                {% endif %}
                <p><a class="btn btn-primary btn-lg" href="{{ url('addresses/newAddress') }}" role="button">Add new address</a></p>
            </div>
        </div>
            
        <script>
            /* Formatting function for row details - modify as you need */
            function format ( d ) {
                // `d` is the original data object for the row
                return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
                    '<tr>'+
                        '<td><p>Baie</p></td>'+
                        '<td><p>Bucatarie</p></td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td>Rece</td>'+
                        '<td>Rece</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td>Calda</td>'+
                        '<td>Calda</td>'+
                    '</tr>'+
                '</table>';
            }
            
            $(document).ready(function() {
                var addressesTable = $('#addresses').DataTable({
                    "ajax": {
                        "url": '/apm/addresses/getAddresses',
                        "dataSrc": ""
                    },
                    "paging": false,
                    "ordering": false,
                    "info": false,
                    "searching": false,
                    "dom":
                        '<"fg-toolbar ui-toolbar ui-widget-header ui-helper-clearfix ui-corner-tl ui-corner-tr"lfr>'+
                        't'+
                        '<"fg-toolbar ui-toolbar ui-widget-header ui-helper-clearfix ui-corner-bl ui-corner-br"ip>',
                    "iDisplayLength": 10,
                    "columns": [
                        {
                            "data": null,
                            "render": function (data, type, row) {
                                return row['city'];
                            }
                        },
                        {
                            "data": null,
                            "render": function (data, type, row) {
                                return row['street'];
                            }
                        },
                        {
                            "data": null,
                            "render": function (data, type, row) {
                                return row['number'];
                            }
                        },
                        {
                            "data": null,
                            "render": function (data, type, row) {
                                return row['building'];
                            }
                        },
                        {
                            "data": null,
                            "render": function (data, type, row) {
                                return row['entrance'];
                            }
                        },
                        {
                            "data": null,
                            "render": function (data, type, row) {
                                return row['apartment'];
                            }
                        },
                        {
                            "data": null,
                            "render": function(data, type, row) {
                                return '<center><button class="btn btn-default" id="expand"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button></center>';
                            }
                        }
                    ]
                });
                
                 // Add event listener for opening and closing details
                $('#addresses tbody').on('click', '#expand', function() {
                    var tr = $(this).closest('tr');
                    var row = addressesTable.row(tr);

                    if (row.child.isShown()) {
                        // This row is already open - close it
                        row.child.hide();
                        tr.removeClass('shown');
                    } else {
                        // Open this row
                        row.child(format()).show();
                        tr.addClass('shown');
                    }
                });
            });
        </script>    
{% endblock %}

