<?php $this->renderSection('navbar')?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="dashboard">V&G Events</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="dashboard">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="createEvent">Cadastrar Eventos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="registeredEvent">Eventos Cadastrados</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="showVoucher">Vouchers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true"><?php session('user_name')?></a>
        </li>
      </ul>
    </div>
  </div>
</nav>