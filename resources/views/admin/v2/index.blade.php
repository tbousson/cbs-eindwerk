@extends('layouts.v2.admin')
@section('breadcrumb')
{{ Breadcrumbs::render('admin') }}

@endsection
@section('content')
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                    <div class="card-header card-header-primary">
                      <h4 class="card-title ">Simple Table</h4>
                      <p class="card-category"> Here is a subtitle for this table</p>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table">
                          <thead class=" text-primary">
                            <th>
                              ID
                            </th>
                            <th>
                              Name
                            </th>
                            <th>
                              Country
                            </th>
                            <th>
                              City
                            </th>
                            <th>
                              Salary
                            </th>
                          </thead>
                          <tbody>
                            
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
          </div>
        </div>
      </div>
      @endsection
      