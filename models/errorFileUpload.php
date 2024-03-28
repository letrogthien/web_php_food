<?
class ErrorFileUpload {
    public static function getErrorMessage($errorCode) {
        switch ($errorCode) {
            case UPLOAD_ERR_OK:
                return 'OK'; // No error
            case UPLOAD_ERR_INI_SIZE:
                return 'Tập tin vượt quá dung lượng tối đa được phép trong php.ini';
            case UPLOAD_ERR_FORM_SIZE:
                return 'Tập tin vượt quá giới hạn được chỉ định trong biểu mẫu HTML';
            case UPLOAD_ERR_PARTIAL:
                return 'Tập tin chỉ được tải lên một phần';
            case UPLOAD_ERR_NO_FILE:
                return 'Không có tập tin được tải lên';
            case UPLOAD_ERR_NO_TMP_DIR:
                return 'Thiếu thư mục tạm thời';
            case UPLOAD_ERR_CANT_WRITE:
                return 'Không thể ghi tập tin vào ổ đĩa';
            case UPLOAD_ERR_EXTENSION:
                return 'Tải tệp bị dừng bởi một phần mở rộng';
            default:
                return 'Lỗi tải tập tin không xác định';
        }
    }
}