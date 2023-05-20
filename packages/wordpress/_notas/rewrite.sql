/* Queries para reemplazar la URL del sitio prod con la local: */

UPDATE wp_options SET option_value = replace(option_value, 'https://www.example.com', 'http://localhost/mylocalsite') WHERE option_name = 'home' OR option_name = 'siteurl';
  
UPDATE wp_posts SET post_content = replace(post_content, 'https://www.example.com', 'http://localhost/mylocalsite');
  
UPDATE wp_postmeta SET meta_value = replace(meta_value,'https://www.example.com','http://localhost/mylocalsite');