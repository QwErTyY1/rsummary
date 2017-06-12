<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div id="allContent">

    <div id="goContentReg">


        <div class="main-container">
            <div class="main wrapper clearfix">

                <article>

                   <div class="container">


<div class="resume">
    <header class="page-header">
    <h1 class="page-title">Резюме <?php  echo $post_resume->user_name?></h1>
    <small> <i class="fa fa-clock-o"></i> Последнее обновление: <time>Субота, Октябрь 05, 2014</time></small>
  </header>
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
    <div class="panel panel-default">
      <div class="panel-heading resume-heading">
        <div class="row">
          <div class="col-lg-12">
            <div class="col-xs-12 col-sm-4">
              <figure>
                <img class="img-circle img-responsive" alt="" src="http://placehold.it/300x300">
              </figure>

              <div class="row">
                <div class="col-xs-12 social-btns">

                </div>
              </div>

            </div>

            <div class="col-xs-12 col-sm-8">
              <ul class="list-group">
                <li class="list-group-item"><?=$post_resume->user_surname.'&nbsp'.$post_resume->user_name;?></li>
                <li class="list-group-item"><?=$post_resume->job_title;?></li>
                <li class="list-group-item"><i class="fa fa-phone"></i><?=$post_resume-> phone_number;?></li>
                <li class="list-group-item"><i class="fa fa-envelope"></i><?=$post_resume->user_email;?></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="bs-callout bs-callout-danger">
        <h4>Резюме</h4>
        <p>
            <?=$post_resume->resume_description;?>
        </p>
      </div>
      <div class="bs-callout bs-callout-danger">
        <h4>Интересные исследования</h4>
        <p>
            <?=$post_resume->interesting_research;?>
        </p>
      </div>

      <div class="bs-callout bs-callout-danger">
        <h4>Предыдущий опыт</h4>
        <ul class="list-group">
            <?php foreach ($experience as $item):?>
          <a class="list-group-item inactive-link" href="#">
            <h4 class="list-group-item-heading">
                <?=$item->experience_title; ?>
</h4>
            <p class="list-group-item-text">
                <?=$item->experience_description; ?>
            </p>
          </a>
            <?php endforeach; ?>
                </ul>
            <p></p>
          </a>
        </ul>
      </div>
      <div class="bs-callout bs-callout-danger">
        <h4>Ключевой опыт</h4>
        <ul class="list-group">
            <?php foreach ($experience as $item):?>
          <li class="list-group-item"><?=$item->experience_title; ?> </li>
            <?php endforeach; ?>
        </ul>
      </div>
      <div class="bs-callout bs-callout-danger">
        <h4>Навыки языка и платформы</h4>
        <ul class="list-group">
          <a class="list-group-item inactive-link" href="#">


            <div class="progress">
              <div data-placement="top" style="width: 80%;"
              aria-valuemax="100" aria-valuemin="0" aria-valuenow="80" role="progressbar" class="progress-bar progress-bar-success">
                <span class="sr-only">80%</span>
                <span class="progress-type">Java/ JavaEE/ Spring Framework </span>
              </div>
            </div>
            <div class="progress">
              <div data-placement="top" style="width: 70%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="1" role="progressbar" class="progress-bar progress-bar-success">
                <span class="sr-only">70%</span>
                <span class="progress-type">PHP/ Lamp Stack</span>
              </div>
            </div>
            <div class="progress">
              <div data-placement="top" style="width: 70%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="1" role="progressbar" class="progress-bar progress-bar-success">
                <span class="sr-only">70%</span>
                <span class="progress-type">JavaScript/ NodeJS/ MEAN stack </span>
              </div>
            </div>
            <div class="progress">
              <div data-placement="top" style="width: 65%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="1" role="progressbar" class="progress-bar progress-bar-warning">
                <span class="sr-only">65%</span>
                <span class="progress-type">Python/ Numpy/ Scipy</span>
              </div>
            </div>
            <div class="progress">
              <div data-placement="top" style="width: 60%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-warning">
                <span class="sr-only">60%</span>
                <span class="progress-type">C</span>
              </div>
            </div>
            <div class="progress">
              <div data-placement="top" style="width: 50%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" role="progressbar" class="progress-bar progress-bar-warning">
                <span class="sr-only">50%</span>
                <span class="progress-type">C++</span>
              </div>
            </div>
            <div class="progress">
              <div data-placement="top" style="width: 10%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" role="progressbar" class="progress-bar progress-bar-danger">
                <span class="sr-only">10%</span>
                <span class="progress-type">Go</span>
              </div>
            </div>

            <div class="progress-meter">
              <div style="width: 25%;" class="meter meter-left"><span class="meter-text">I suck</span></div>
              <div style="width: 25%;" class="meter meter-left"><span class="meter-text">I know little</span></div>
              <div style="width: 30%;" class="meter meter-right"><span class="meter-text">I'm a guru</span></div>
              <div style="width: 20%;" class="meter meter-right"><span class="meter-text">I''m good</span></div>
            </div>

          </a>

        </ul>
      </div>
      <div class="bs-callout bs-callout-danger">
        <h4>Образование</h4>
        <table class="table table-striped table-responsive ">
          <thead>
            <tr><th>Степень</th>
            <th>Место учебы</th>
            <th>Год выпуска</th>

          </tr></thead>
            <?php foreach ($educations as $education):?>
          <tbody>
            <tr>
              <td><?=$education->academic_degree; ?></td>
              <td><?=$education->place_of_study; ?></td>
              <td><?=$education->edition; ?></td>

            </tr>

          </tbody>
            <?php endforeach; ?>
        </table>
      </div>
    </div>

  </div>
</div>

</div>

</div>



                </article>

<!--
                <aside>
                    <h3>aside</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales urna non odio egestas tempor. Nunc vel vehicula ante. Etiam bibendum iaculis libero, eget molestie nisl pharetra in. In semper consequat est, eu porta velit mollis nec. Curabitur posuere enim eget turpis feugiat tempor. Etiam ullamcorper lorem dapibus velit suscipit ultrices.</p>
                </aside>
-->

            </div> <!-- #main -->
        </div> <!-- #main-container -->
    </div>
</div>