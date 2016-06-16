      </div>
    </div>
    <footer class="footer footer-custom">
      <div class="container-fluid">
        <ul class="list-inline align-center">
          <li class="vert-align-mid"">
            <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">
              <!-- CC image -->
              <?php
                $imgData = array(
                  'alt'   => 'Creative Commons License',
                  'class' => 'cc-img',
                  'src'   => 'https://i.creativecommons.org/l/by-sa/4.0/88x31.png'
                );
                echo img($imgData);
              ?>
            </a>
          </li>
          <li class="vert-align-mid">
            <!-- Github Follow -->
            <a
              aria-label="Follow @JasonLighthunter on GitHub"
              data-count-aria-label="# followers on GitHub"
              data-count-api="/users/JasonLighthunter#followers"
              data-count-href="/JasonLighthunter/followers"
              data-style="mega"
              href="https://github.com/JasonLighthunter"
              class="github-button">
                Follow @JasonLighthunter
            </a>
          </li>
          <li class="vert-align-mid"">
            <!-- Github Star -->
            <a
              aria-label="Star JasonLighthunter/The-Sandpoint-Archives on GitHub"
              data-count-aria-label="# stargazers on GitHub"
              data-count-api="/repos/JasonLighthunter/The-Sandpoint-Archives#stargazers_count"
              data-count-href="/JasonLighthunter/The-Sandpoint-Archives/stargazers"
              data-style="mega"
              data-icon="octicon-star"
              href="https://github.com/JasonLighthunter/The-Sandpoint-Archives"
              class="github-button">
                Star
            </a>
          </li>
          <li class="vert-align-mid"">
            <!-- About -->
            <?php
              $href = site_url('about');
              echo anchor($href, 'About');
            ?>
          </li>
          <li class="vert-align-mid"">
            <!-- Contact -->
            <?php
              $href = site_url('contact');
              echo anchor($href, 'Contact');
            ?>
          </li>
          <!-- webs2 delete later -->
          <li class="vert-align-mid"">
            <?php
              $href = site_url('login/admin');
              echo anchor($href, 'Webs2 dashboard');
            ?>
          </li>
          <!-- webs2 ends -->
        </ul>
      </div>
    </footer>

    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/ff9e874976.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src=<?php echo base_url('assets/js/validator.js') ?>></script>
  </body>
</html>