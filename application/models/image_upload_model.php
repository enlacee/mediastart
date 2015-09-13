<?php

class Image_Upload_Model extends CI_Model {

    public function getAll()
    {
        $this->db->select('id, image_path');
		$this->db->from('image_upload');
		$this->db->order_by('id', 'asc');
		$query = $this->db->get();

        return $query->result_array();
    }

    // Insert Image Into Database.
    public function insert_image($data) {
        $this->db->insert('image_upload', $data);
    }

    // Delete Image From Database.
    public function delete_image($img) {
        $this->db->where('image_path', $img);
        $this->db->delete('image_upload');
    }

    // Insert Data Into Database.
    public function insert_watermark_image($data) {
        $this->db->insert('image_watermark', $data);
    }

    // Delete Watermark Image Data From Database.
    public function watermark_image_delete($img) {
        $this->db->where('watermark_img_path', $img);
        $this->db->delete('image_watermark');
    }

    // Insert Original Image From Rotate Manipulation Into Database.
    public function rotate_image_insert($data) {
        $this->db->insert('image_rotate', $data);
    }

    // Update Rotate Image Into Database.
    public function rotate_image($original_img, $data) {
        $this->db->where('original_image_path', $original_img);
        $this->db->update('image_rotate', $data);
    }

    // Delete Rotate Image From Database.
    public function rotate_image_delete($img) {
        $this->db->where('original_image_path', $img);
        $this->db->delete('image_rotate');
    }

    // Insert Original Image From crop Manipulation Into Database.
    public function crop_image_insert($data) {
        $this->db->insert('image_crop', $data);
    }

    // Update Rotate Image Into Database.
    public function crop_image_update($original_img, $data) {
        $this->db->where('original_img_path', $original_img);
        $this->db->update('image_crop', $data);
    }

    // Insert Original Image From crop Manipulation Into Database.
    public function resize_image_insert($data) {
        $this->db->insert('image_resize', $data);
    }

        // Update Rotate Image Into Database.
    public function resize_image_update($original_img, $data) {
        $this->db->where('original_img_path', $original_img);
        $this->db->update('image_resize', $data);
    }


}

?>
