<?php
/****
 * This is custom pagination for news
 */
?>
<div class="pagination">
  <button class="btn-pagination prev">
    <svg
      width="51"
      height="15"
      viewBox="0 0 51 15"
      fill="none"
      xmlns="http://www.w3.org/2000/svg"
    >
      <path
        d="M50 7.5L2 7.5"
        stroke="#695E4A"
        stroke-width="1.5"
        stroke-linecap="round"
        stroke-linejoin="round"
      />
      <path
        d="M7.5 1L1 7.5L7.5 14"
        stroke="#695E4A"
        stroke-width="1.5"
        stroke-linecap="round"
        stroke-linejoin="round"
      />
    </svg>
    <span class="text">Previous</span>
  </button>
  <div class="page-navigator">
    <span class="current-page"><?php echo $args['current_page']; ?></span>&nbsp;/&nbsp;
    <span class="total-page"><?php echo $args['max_page']; ?></span>
  </div>
  <button class="btn-pagination next">
    <span class="text">Next</span>
    <svg
      width="51"
      height="15"
      viewBox="0 0 51 15"
      fill="none"
      xmlns="http://www.w3.org/2000/svg"
    >
      <path
        d="M1 7.5L49 7.5"
        stroke="#695E4A"
        stroke-width="1.5"
        stroke-linecap="round"
        stroke-linejoin="round"
      />
      <path
        d="M43.5 14L50 7.5L43.5 1"
        stroke="#695E4A"
        stroke-width="1.5"
        stroke-linecap="round"
        stroke-linejoin="round"
      />
    </svg>
  </button>
</div>