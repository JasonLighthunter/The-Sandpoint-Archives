      </div>
    </div>
    <footer class="footer navbar-fixed-bottom footer-custom">
      <div class="container-fluid">
        <ul class="list-inline align-center">
          <li>
            <a class="footer-item" rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">
              <!-- CC image -->
              <?php 
                $imgData = array(
                  'alt' => 'Creative Commons License',
                  'class' => 'cc-img',
                  'src'   => 'https://i.creativecommons.org/l/by-sa/4.0/88x31.png'
                );
                echo img($imgData);
              ?>
            </a>
          </li>
          <li>
            <!-- Github Follow -->
            <?php 
              $data = array(
                'aria-label'            => 'Follow @jasonlighthunter on GitHub',
                'data-count-aria-label' => '# followers on GitHub',
                'data-count-api'        => '/users/jasonlighthunter#followers',
                'data-count-href'       => '/jasonlighthunter/followers',
                'class'                 => 'github-button footer-item',
                'data-style'            => 'mega',
                'href'                  => 'https://github.com/jasonlighthunter'
              );
              echo anchor($data, 'Follow @jasonlighthunter');
            ?>
          </li>
          <li>
            <!-- Github Star -->
            <?php 
              $data = array(
                'aria-label'            => 'Star jasonlighthunter/The-Sandpoint-Archives on GitHub',
                'data-count-aria-label' => '# stargazers on GitHub',
                'data-count-api'        => '/repos/jasonlighthunter/The-Sandpoint-Archives#stargazers_count',
                'data-count-href'       => '/jasonlighthunter/The-Sandpoint-Archives/stargazers',
                'data-style'            => 'mega',
                'data-icon'             =>'octicon-star',
                'class'                 =>'github-button footer-item',
                'href'                  =>'https://github.com/jasonlighthunter/The-Sandpoint-Archives'
              );
              echo anchor($data, 'Star');
            ?>
          </li>
          <li>
            <!-- About -->
            <?php 
              $data = array(
                'class' => 'footer-item',
                'href'  => $site_url('about')
              );
              echo anchor($data, 'About');
            ?>
          </li>
          <li>
            <!-- Contact -->
            <?php 
              $data = array(
                'class' => 'footer-item',
                'href'  => $site_url('contact')
              );
              echo anchor($data, 'Contact');
            ?>
          </li>
        </ul>
      </div>
    </footer>
    <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/ff9e874976.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>