<?php
	header("Content-type: text/xml");
 
	 // Hàm chuyển đổi những ký tự đặc biệt để khỏi lỗi XML
	function xml_entities($string) {
	    return str_replace(
	            array("&", "<", ">", '"', "'"), array("&amp;", "&lt;", "&gt;", "&quot;", "&apos;"), $string
	    );
	}
?>
<?xml version="1.0" ?>
<rss version="2.0">
	<channel>
        <title>'Hệ Thống Tiêu chuẩn, quy chuẩn bộ Xây Dựng'</title>
        <link>http://localhost:1997/trongbinh/BoXD_v8/index.html</link>
        <description>Hệ Thống Tiêu chuẩn, quy chuẩn bộ Xây Dựng Hệ Thống Tiêu chuẩn, quy chuẩn bộ Xây Dựng</description>
        <language>vi_VN</language>
    </channel>
</rss>