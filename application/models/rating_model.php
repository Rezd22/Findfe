<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class rating_model extends CI_Model
{
    function get_toko_data()
    {
        $this->db->order_by('r_id', 'DESC');
        return $this->db->get('toko');
    }

    function get_toko_rating($r_id)
    {
        $this->db->select('AVG(rating) as rating');
        $this->db->from('rating');
        $this->db->where('r_id', $r_id);
        $data = $this->db->get();
        foreach ($data->result_array() as $row) {
            return $row["rating"];
        }
    }

    function html_output()
    {
        $data = $this->get_toko_data();
        $output = '';
        foreach ($data->result_array() as $row) {
            $color = '';
            $rating = $this->get_toko_rating($row["r_id"]);
            $output .= '
   <h3 class="text-primary">' . $row["name"] . '</h3>
   <ul class="list-inline" data-rating="' . $rating . '" title="Average Rating - ' . $rating . '">
   ';
            for ($count = 1; $count <= 5; $count++) {
                if ($count <= $rating) {
                    $color = 'color:#ffcc00;';
                } else {
                    $color = 'color:#ccc;';
                }

                $output .= '<li title="' . $count . '" r_id="' . $row['r_id'] . '-' . $count . '" data-index="' . $count . '" data-r_id="' . $row["r_id"] . '" data-rating="' . $rating . '" class="rating" style="cursor:pointer; ' . $color . ' font-size:24px;">&#9733;</li>';
            }
            $output .= '</ul>
   <p>' . $row["phone"] . '</p>
   <label style="text-danger">' . $row["address"] . '</label>
   <label style="text-danger">' . $row["email"] . '</label>
   <br>
   <br>
   <div class="py-3 pb-4 border-bottom">
                        <a href="comment/' . $row["r_id"] . '" class="btn btn-primary">Ulasan</a>
                    </div>
   
 
   <hr />
   ';
        }
        echo $output;
    }

    function insert_rating($data)
    {
        $this->db->insert('rating', $data);
    }
}
