@extends('Backend.layout.master')


@section('content')
<div class="vh-100" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-12 col-xl-10">

        <div class="card">
          <div class="card-header p-3">
            <h5 class="mb-0"><i class="fas fa-tasks me-2"></i>Task List</h5>
          </div>
          <div class="card-body" data-mdb-perfect-scrollbar="true" style="position: relative; height:500px; ">

            <table class="table mb-0">
              <thead>
                <tr>
                  <th scope="col">Team Member</th>
                  <th scope="col">Task</th>
                  <th scope="col">Priority</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr class="fw-normal">
                  <th>
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-5.webp"
                      class="shadow-1-strong rounded-circle" alt="avatar 1"
                      style="width: 55px; height: auto;">
                    <span class="ms-2">Alice Mayer</span>
                  </th>
                  <td class="align-middle">
                    <span>Call Sam For payments</span>
                  </td>
                  <td class="align-middle">
                    <h6 class="mb-0"><span class="badge bg-danger">High priority</span></h6>
                  </td>
                  <td class="align-middle">
                    <a href="#!" data-mdb-toggle="tooltip" title="Done"><i
                        class="fas fa-check text-success me-3"></i></a>
                    <a href="#!" data-mdb-toggle="tooltip" title="Remove"><i
                        class="fas fa-trash-alt text-danger"></i></a>
                  </td>
                </tr>
                <tr class="fw-normal">
                  <th>
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-4.webp"
                      class="shadow-1-strong rounded-circle" alt="avatar 1"
                      style="width: 55px; height: auto;">
                    <span class="ms-2">Kate Moss</span>
                  </th>
                  <td class="align-middle">Make payment to Bluedart</td>
                  <td class="align-middle">
                    <h6 class="mb-0"><span class="badge bg-success">Low priority</span></h6>
                  </td>
                  <td class="align-middle">
                    <a href="#!" data-mdb-toggle="tooltip" title="Done"><i
                        class="fas fa-check text-success me-3"></i></a>
                    <a href="#!" data-mdb-toggle="tooltip" title="Remove"><i
                        class="fas fa-trash-alt text-danger"></i></a>
                  </td>
                </tr>
                <tr class="fw-normal">
                  <th>
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp"
                      class="shadow-1-strong rounded-circle" alt="avatar 1"
                      style="width: 55px; height: auto;">
                    <span class="ms-2">Danny McChain</span>
                  </th>
                  <td class="align-middle">Office rent</td>
                  <td class="align-middle">
                    <h6 class="mb-0"><span class="badge bg-warning">Middle priority</span></h6>
                  </td>
                  <td class="align-middle">
                    <a href="#!" data-mdb-toggle="tooltip" title="Done"><i
                        class="fas fa-check text-success me-3"></i></a>
                    <a href="#!" data-mdb-toggle="tooltip" title="Remove"><i
                        class="fas fa-trash-alt text-danger"></i></a>
                  </td>
                </tr>
                <tr class="fw-normal">
                  <th>
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-3.webp"
                      class="shadow-1-strong rounded-circle" alt="avatar 1"
                      style="width: 55px; height: auto;">
                    <span class="ms-2">Alexa Chung</span>
                  </th>
                  <td class="align-middle">Office grocery shopping</td>
                  <td class="align-middle">
                    <h6 class="mb-0"><span class="badge bg-danger">High priority</span></h6>
                  </td>
                  <td class="align-middle">
                    <a href="#!" data-mdb-toggle="tooltip" title="Done"><i
                        class="fas fa-check text-success me-3"></i></a>
                    <a href="#!" data-mdb-toggle="tooltip" title="Remove"><i
                        class="fas fa-trash-alt text-danger"></i></a>
                  </td>
                </tr>
                <tr class="fw-normal">
                  <th class="">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-8.webp"
                      class="shadow-1-strong rounded-circle" alt="avatar 1"
                      style="width: 55px; height: auto;">
                    <span class="ms-2">Ben Smith</span>
                  </th>
                  <td class="align-middle">Ask for Lunch to Clients</td>
                  <td class="align-middle">
                    <h6 class="mb-0"><span class="badge bg-success">Low priority</span></h6>
                  </td>
                  <td class="align-middle">
                    <a href="#!" data-mdb-toggle="tooltip" title="Done"><i
                        class="fas fa-check text-success me-3"></i></a>
                    <a href="#!" data-mdb-toggle="tooltip" title="Remove"><i
                        class="fas fa-trash-alt text-danger"></i></a>
                  </td>
                </tr>
                <tr class="fw-normal">
                  <th class="border-0">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-2.webp"
                      class="shadow-1-strong rounded-circle" alt="avatar 1"
                      style="width: 55px; height: auto;">
                    <span class="ms-2">Annie Hall</span>
                  </th>
                  <td class="border-0 align-middle">Create weekly tasks plan</td>
                  <td class="border-0 align-middle">
                    <h6 class="mb-0"><span class="badge bg-warning">Medium priority</span></h6>
                  </td>
                  <td class="border-0 align-middle">
                    <a href="#!" data-mdb-toggle="tooltip" title="Done"><i
                        class="fas fa-check text-success me-3"></i></a>
                    <a href="#!" data-mdb-toggle="tooltip" title="Remove"><i
                        class="fas fa-trash-alt text-warning"></i></a>
                  </td>
                </tr>
              </tbody>
            </table>

          </div>
          <div class="card-footer text-end p-3">
            <button class="btn btn-warning">Cancel</button>
            <button class="btn btn-primary">Add Task</button>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
  @endsection