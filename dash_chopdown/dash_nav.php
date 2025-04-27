<?php 
  require_once "../classes/unit.class.php";

  $objUnits = new Units;
  $unit = $objUnits->showAllUnits();
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center gap-2" href="../dashboard/descd.php">
      <img src="../imgs/descd.png" alt="" />
      <img src="../imgs/wmsu.png" alt="" />
      <span id="navbar-text" class="hidden-text d-none d-lg-inline-block text-wrap text-truncate">
        Department of Extension Services and Community Development
      </span>

    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../dashboard/descd.php">Home</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                About
            </a>
            <ul class="dropdown-menu">
                <li class="dropdown-submenu">
                <a class="dropdown-item" href="../dashboard/goals.php">University Extension Services Framework</a>
               
                <!-- <ul class="dropdown-menu sub-menu">
                    <li><a class="dropdown-item" href="../dashboard/goals.php">Goals</a></li>
                    <hr class="dropdown-divider" />
                    <li><a class="dropdown-item" href="../dashboard/objectives.php">Objectives</a></li>
                    <hr class="dropdown-divider" />
                    <li><a class="dropdown-item" href="../dashboard/extenagenda.php">Extension Agenda</a></li>
                    <hr class="dropdown-divider" />
                    <li><a class="dropdown-item" href="../dashboard/serviceframework.php">Extension Services Department Framework</a></li>
                </ul> -->
                </li>
                <hr class="dropdown-divider" />
                <li><a class="dropdown-item" href="../dashboard/orgstructure.php">Organizational Structure</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Extension Services Units
          </a>
          <ul class="dropdown-menu">
            <?php 
              $count = count($unit);
              foreach ($unit as $index => $u): 
            ?>
              <li>
              <a class="dropdown-item" href="../dashboard/units.php?unit_id=<?php echo $u['unit_id']; ?>">
                <?php echo $u['u_title']; ?>
              </a>

              </li>
              <?php if ($index < $count - 1): ?>
                <hr class="dropdown-divider"/>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../dashboard/projact.php">Projects & Activities</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact Us</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
