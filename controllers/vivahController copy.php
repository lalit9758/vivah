<?php

use function PHPSTORM_META\type;

require_once('../model/func.php');

class Home
{
    private static $instance = null;
    private $func;

    private function __construct()
    {
        $this->func = Func::getInstance();
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Home();
        }
        return self::$instance;
    }

    public function fetchQuickAccessData()
    {
        $query = "SELECT id, title, description, link, image_name, data_wow_delay FROM quick_access";
        $result = $this->func->selectQuery($query);
        echo json_encode([
            'status' => 'success',
            'data' => $result
        ]);
    }

    public function fetchReviews()
    {
        $query = "SELECT user_id, image_name, review_text, name, location FROM reviews";
        $result = $this->func->selectQuery($query);
        echo json_encode([
            'status' => 'success',
            'data' => $result
        ]);
    }

    public function fetchStatsData()
    {
        $query = "SELECT type, count, label FROM stats";
        $result = $this->func->selectQuery($query);

        if ($result && is_array($result)) {
            echo json_encode([
                'status' => 'success',
                'data' => $result
            ]);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }

    public function fetchCouplesData()
    {
        $query = "SELECT image, name, location, link FROM couples";
        $result = $this->func->selectQuery($query);

        if ($result && is_array($result)) {
            echo json_encode([
                'status' => 'success',
                'data' => $result
            ]);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }

    public function fetchGalleryData()
    {
        $query = "SELECT image_name, category, description FROM gallery_images ORDER BY id LIMIT 12";
        $result = $this->func->selectQuery($query);

        if ($result && is_array($result)) {
            echo json_encode([
                'status' => 'success',
                'data' => $result
            ]);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }

    public function fetchGalleryPageData()
    {
        $query = "SELECT image_name, category, description FROM gallery_images ORDER BY id";
        $result = $this->func->selectQuery($query);

        if ($result && is_array($result)) {
            echo json_encode([
                'status' => 'success',
                'data' => $result
            ]);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }

    public function fetchServices()
    {
        $query = "SELECT image_name, category, title, description FROM wedding_services";
        try {
            $result = $this->func->selectQuery($query);

            if ($result && is_array($result)) {
                echo json_encode([
                    'status' => 'success',
                    'data' => $result
                ]);
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'No data found or query returned empty result'
                ]);
            }
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Database query error: ' . $e->getMessage()
            ]);
        }
    }
    public function allprofiles()
    {
        // Start the session
        session_start();
        $loggedInEmail = $_SESSION['email'] ?? null;
    
        // Retrieve filter parameters from query string
        $gender =  $_GET['gender'] ?? null;
        $ageRange = isset($_GET['age']) ? $_GET['age'] : null;
        $religion = isset($_GET['religion']) ? $_GET['religion'] : null;
        $location = isset($_GET['location']) ? $_GET['location'] : null;
        $availability = isset($_GET['availability']) ? $_GET['availability'] : null;
    
        // Base query
        $query = "SELECT u.id, u.email, u.name, p.religion, p.profile_picture, p.status, p.city, p.age, p.height, p.job_type, p.gender 
                  FROM users u
                  JOIN user_profiles p ON u.id = p.user_id
                  WHERE 1=1";
    
        // Exclude the logged-in user's profile if the email is set
        if (!empty($loggedInEmail)) {
            $query .= " AND u.email != $loggedInEmail";
        }
    
        // Apply filters to the query
        if ($gender) {
            $query .= " AND p.gender = '" . $gender . "'";
        }
        if ($ageRange) {
            list($ageStart, $ageEnd) = explode('-', $ageRange);
            $query .= " AND p.age BETWEEN " . intval($ageStart) . " AND " . intval($ageEnd);
        }
        if ($religion) {
            $query .= " AND p.religion = '" . $religion . "'";
        }
        if ($location) {
            $query .= " AND p.city = '" . $location . "'";
        }
        if ($availability) {
            $query .= " AND p.status = '" . $availability . "'";
        }
    
        try {
            // Execute the query
            $result = $this->func->selectQuery($query);
    
            if (!empty($result)) {
                echo json_encode([
                    'status' => 'success',
                    'data' => $result,
                    'loggedIn' => isset($_SESSION['email'])
                ]);
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'No data found or query returned empty result'
                ]);
            }
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Database query error: ' . $e->getMessage()
            ]);
        }
    }
    



    public function profile_info()
    {
        session_start();

        // Ensure the session email is set
        if (!isset($_SESSION['email'])) {
            echo json_encode(['status' => 'error', 'message' => 'Session email not set.']);
            return;
        }

        $email = $_SESSION['email'];

        // Use placeholders for safe SQL query construction
        $query = "SELECT u.id, u.name, u.email, u.phone, u.created_at, u.updated_at,
                         p.father_name,p.gender,p.age, p.dob, p.height, p.weight, p.degree,
                         p.religion, p.profession, p.company, p.position, p.salary, p.marital_status,
                         p.children, p.city, p.address, p.about, p.status, p.facebook, p.twitter,
                         p.whatsapp, p.linkedin, p.youtube, p.instagram, p.profile_picture,p.job_type,p.hobbies, 
                         p.created_at AS profile_created_at, p.updated_at AS profile_updated_at
                  FROM users u
                  JOIN user_profiles p ON u.id = p.user_id
                  WHERE u.email = {$email}";

        $result = $this->func->selectQuery($query);

        $queryPhotos = "SELECT file_name FROM photos WHERE user_id = (SELECT id FROM users WHERE email = {$email})";
        $photos = $this->func->selectQuery($queryPhotos);

        // Check if data was returned
        if (!empty($result)) {
            echo json_encode([
                'status' => 'success',
                'data' => $result,
                'photos' => $photos  // Assuming only one record will be fetched
            ]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No data found for the given email.']);
        }
    }
    public function profile_details($data)
    {
        // Ensure $data is set and contains 'user_id'
        if (!isset($data['user_id'])) {
            echo json_encode(['status' => 'error', 'message' => 'User ID is missing']);
            return;
        }

        $user_id = $this->func->escapeString($data['user_id']);
        // Assuming $user_id is an integer
        $query = "SELECT u.id, u.name, u.email, u.phone, u.password, u.created_at, u.updated_at,
p.father_name,p.gender, p.age, p.dob, p.height, p.weight, p.degree,
p.religion, p.profession, p.company, p.position, p.salary, p.marital_status,
p.children, p.city, p.address, p.about, p.status, p.facebook, p.twitter,
p.whatsapp, p.linkedin, p.youtube, p.instagram, p.profile_picture, p.job_type, p.hobbies, 
p.created_at AS profile_created_at, p.updated_at AS profile_updated_at
FROM users u
left JOIN user_profiles p ON u.id = p.user_id
WHERE u.id =$user_id ";


        $result = $this->func->selectQuery($query);

        $queryPhotos = "SELECT file_name FROM photos WHERE user_id = (SELECT id FROM users WHERE id = {$user_id})";
        $photos = $this->func->selectQuery($queryPhotos);

        if (!empty($result)) {
            $response = [
                'status' => 'success',
                'data' => $result,
                'photos' => $photos
            ];
            echo json_encode($response);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No data found for the given id.']);
        }
    }

    public function addRegister($data)
    {
        // Escape and sanitize input data
        $name = $this->func->escapeString($data['name']);
        $email = $this->func->escapeString($data['email']);
        $phone = $this->func->escapeString($data['phone']);
        $pswd = $this->func->escapeString(md5($data['pswd']));
        $otp = $this->func->escapeString($data['otp']);

        // Check if email or phone already exists
        $emailCheckQuery = "SELECT * FROM users WHERE email = $email";
        $phoneCheckQuery = "SELECT * FROM users WHERE phone = $phone";

        if ($this->func->selectQuery($emailCheckQuery)) {
            echo json_encode(['status' => 'error', 'message' => 'Email already exists']);
            return;
        }

        if ($this->func->selectQuery($phoneCheckQuery)) {
            echo json_encode(['status' => 'error', 'message' => 'Phone number already exists']);
            return;
        }

        // Check if the provided OTP is valid and not expired
        $currentTime = date('Y-m-d H:i:s');
        $otpQuery = "SELECT * FROM otp WHERE email = $email AND otp = $otp AND status = 1 AND TIMESTAMPDIFF(MINUTE, created_at, '$currentTime') <= 5";
        $otpResult = $this->func->selectQuery($otpQuery);

        if ($otpResult) {
            // Insert the user data into the users table
            $query = "INSERT INTO users (name, email, phone, password) VALUES ($name, $email, $phone, $pswd)";
            $result = $this->func->executeQuery($query);

            if ($result) {
                // Optionally, mark the OTP as used
                $updateOtpQuery = "UPDATE otp SET status = 0 WHERE email = $email AND otp = $otp";
                $this->func->executeQuery($updateOtpQuery);

                echo json_encode(['status' => 'success', 'message' => 'Registration successful']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Registration failed']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid or expired OTP']);
        }
    }


    public function login($data)
    {
        session_start();
        $email = $this->func->escapeString($data['email']);
        $pswd = md5($data['pswd']);

        // Check if the email exists
        $checkEmailQuery = "SELECT email, password FROM users WHERE email=$email";
        $result = $this->func->selectQuery($checkEmailQuery);

        if ($result && count($result) > 0) {
            // Email exists, now check the password
            $storedPassword = $result[0]['password'];
            if ($storedPassword === $pswd) {
                $_SESSION['email'] = $email;
                echo json_encode(['status' => 'success', 'message' => 'Login successful']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Invalid password']);
            }
        } else {
            // Check if any user has the given password to provide a more specific error message
            $checkPasswordQuery = "SELECT email FROM users WHERE password='$pswd'";
            $passwordResult = $this->func->selectQuery($checkPasswordQuery);

            if ($passwordResult && count($passwordResult) > 0) {
                echo json_encode(['status' => 'error', 'message' => 'Invalid email']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Invalid email and password']);
            }
        }
        exit; // Ensure no additional output
    }
    public function update_profile($data)
    {
        session_start();

        if (!isset($_SESSION['email'])) {
            echo json_encode(['status' => 'error', 'message' => 'Session email not set.']);
            return;
        }

        // Extract data from $data array
        $email = ($_SESSION['email']);
        $name = $this->func->escapeString($data['name']);
        $phone = $this->func->escapeString($data['phone']);
        $gender = $this->func->escapeString($data['gender']);
        $city = $this->func->escapeString($data['city']);
        $dob = $this->func->escapeString($data['dob']);
        $age = (int)$data['age'];
        $height = (float)$data['height'];
        $weight = (float)$data['weight'];
        $degree = $this->func->escapeString($data['degree']);
        $religion = $this->func->escapeString($data['religion']);
        $profession = $this->func->escapeString($data['profession']);
        $company = $this->func->escapeString($data['company']);
        $position = $this->func->escapeString($data['position']);
        $salary = (float)$data['salary'];
        $marital_status = $this->func->escapeString($data['marital_status']);
        $children = (int)$data['children'];
        $address = $this->func->escapeString($data['address']);
        $about = $this->func->escapeString($data['about']);
        $facebook = $this->func->escapeString($data['facebook']);
        $twitter = $this->func->escapeString($data['twitter']);
        $whatsapp = $this->func->escapeString($data['whatsapp']);
        $linkedin = $this->func->escapeString($data['linkedin']);
        $youtube = $this->func->escapeString($data['youtube']);
        $instagram = $this->func->escapeString($data['instagram']);
        $job_type = $this->func->escapeString($data['job_type']);
        $hobbies = $this->func->escapeString($data['hobbies']);

        // Construct the SQL query
        $query = "UPDATE users u
                  JOIN user_profiles p ON u.id = p.user_id
                  SET u.name = {$name}, u.phone = {$phone},
                      p.gender = {$gender}, p.city = {$city}, p.dob = {$dob}, p.age = {$age}, p.height = {$height},
                      p.weight = {$weight}, p.degree = {$degree}, p.religion = {$religion}, p.profession = {$profession},
                      p.company = {$company}, p.position = {$position}, p.salary = {$salary}, p.marital_status = {$marital_status},
                      p.children = {$children}, p.address = {$address}, p.about = {$about}, p.facebook = {$facebook},
                      p.twitter = {$twitter}, p.whatsapp = {$whatsapp}, p.linkedin = {$linkedin}, p.youtube = {$youtube},
                      p.instagram = {$instagram}, p.job_type = {$job_type}, 
                      p.hobbies = {$hobbies}, p.updated_at = NOW()
                  WHERE u.email = {$email}";

        $result = $this->func->executeQuery($query);

        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Profile updated successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update profile.']);
        }
    }
    public function sendOtp($data)
    {
        // Generate a random 6-digit OTP
        $otp = mt_rand(100000, 999999);
        $otp = $this->func->escapeString($otp);
        $email = $data['email'];
        $status = 1;

        // Insert the email, OTP, and current timestamp into the otp table
        $insertOtpQuery = "INSERT INTO otp (email, otp, status) VALUES ('$email', $otp, $status)";
        $result = $this->func->executeQuery($insertOtpQuery);

        if ($result) {
            // Send the OTP email
            $html = "Your OTP verification code is " . $otp;
            $sendotp = $this->func->smtp_mailer($email, 'OTP Verification', $html);
            if ($sendotp) {
                echo json_encode(['status' => 'success', 'message' => 'otp send successfully.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'otp Failed to send.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'otp Failed to send.']);
        }
    }
    public function sendOtpForget($data)
    {
        // Generate a random 6-digit OTP
        $otp = mt_rand(100000, 999999);
        $otp = $this->func->escapeString($otp);
        $email = $data['email']; // Ensure the email is properly escaped
        $status = 1;

        // Correct query string formation
        $query = "SELECT email FROM users WHERE email='$email'";
        $ans = $this->func->selectQuery($query);

        if ($ans) {
            // Insert the email, OTP, and current timestamp into the otp table
            $insertOtpQuery = "INSERT INTO otp (email, otp, status) VALUES ('$email', $otp, $status)";
            $result = $this->func->executeQuery($insertOtpQuery);

            if ($result) {
                // Send the OTP email
                $html = "Your OTP verification code is " . $otp;
                $sendotp = $this->func->smtp_mailer($email, 'OTP Verification', $html);
                if ($sendotp) {
                    echo json_encode(['status' => 'success', 'message' => 'OTP sent successfully.']);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Failed to send OTP.']);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to insert OTP into database.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Email not found.']);
        }
    }

    public function forgetPasswordOtpCheck($data)
    {
        session_start();
        // Escape and sanitize input data
        $email = $this->func->escapeString($data['email']);
        $otp = $this->func->escapeString($data['otp']);

        // Check if the provided OTP is valid and not expired
        $currentTime = date('Y-m-d H:i:s');
        $otpQuery = "SELECT * FROM otp WHERE email = $email AND otp = $otp AND status = 1 AND TIMESTAMPDIFF(MINUTE, created_at, '$currentTime') <= 5";
        $otpResult = $this->func->selectQuery($otpQuery);

        if ($otpResult) {
            $_SESSION['user_id'] = $email;
            // Optionally, mark the OTP as used
            $updateOtpQuery = "UPDATE otp SET status = 0 WHERE email = $email AND otp = $otp";
            $this->func->executeQuery($updateOtpQuery);


            echo json_encode(['status' => 'success', 'message' => ' successful']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid or expired OTP']);
        }
    }
    public function changePassword($data)
    {
        session_start();

        // Check if user is logged in
        if (isset($_SESSION['user_id'])) {
            $email = $_SESSION['user_id'];
            $newPassword = md5($data['password']);

            // Fetch the current password from the database
            $query = "SELECT password FROM users WHERE email = {$email}";

            $result = $this->func->selectQuery($query);

            if (!empty($result)) {
                $currentPassword = $result[0]['password'];

                // Check if the new password is the same as the old password
                if ($newPassword === $currentPassword) {
                    echo json_encode(['status' => 'error', 'message' => 'Your new password cannot be the same as your old password.']);
                    return;
                }

                // Update the password in the database
                $query = "UPDATE users SET password = '{$newPassword}' WHERE email = {$email}";
                $result = $this->func->executeQuery($query);

                if ($result) {
                    session_unset();
                    session_destroy();
                    echo json_encode(['status' => 'success', 'message' => 'Password updated successfully']);
                } else {
                    session_unset();
                    session_destroy();
                    echo json_encode(['status' => 'error', 'message' => 'Failed to update password']);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'User not found']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
        }
    }
    public function uploadProfileImage($data)
    {
        session_start();
    
        // Check if user is logged in
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
    
            if (!empty($_FILES['file']['name'])) {
                $targetDir = "../assets/images/profiles/{$email}/";
    
                // Create directory if it doesn't exist
                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0777, true);
                }
    
                // Sanitize the filename and target path
                $fileName = basename($_FILES['file']['name']);
                $targetFilePath = $targetDir . $fileName;
    
                // Check if file upload is successful
                if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
                    // Update the database with the new image path
                    $query = "UPDATE user_profiles 
                              JOIN users ON user_profiles.user_id = users.id
                              SET user_profiles.profile_picture = '{$fileName}'
                              WHERE users.email = {$email}";
                    $result = $this->func->executeQuery($query);
    
                    if ($result) {
                        echo json_encode(['status' => 'success', 'imagePath' => $fileName]);
                    } else {
                        echo json_encode(['status' => 'error', 'message' => 'Failed to update the database']);
                    }
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Failed to move the uploaded file']);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'No file uploaded']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
        }
    }
    
    public function fetchProfileUpload($data)
    {
        session_start();
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
    
            $query = "SELECT user_profiles.profile_picture 
                      FROM user_profiles 
                      JOIN users ON user_profiles.user_id = users.id
                      WHERE users.email = {$email}";
            $result = $this->func->selectQuery($query);
            
            if ($result && !empty($result)) {
                echo json_encode([
                    'status' => 'success',
                    'imagePath' => $result[0]['profile_picture'],
                    'email' => $email
                ]);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'No profile picture found']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
        }
    }
    
    




    // Add more POST methods as needed
}

$controller = Home::getInstance();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (isset($_GET['action'])) {
        $data = $_GET;
        switch ($_GET['action']) {
            case 'fetch_reviews':
                $controller->fetchReviews();
                break;
            case 'quick_access':
                $controller->fetchQuickAccessData();
                break;
            case 'fetch_stats':
                $controller->fetchStatsData();
                break;
            case 'fetch_couples':
                $controller->fetchCouplesData();
                break;
            case 'fetch_photo_gallery':
                $controller->fetchGalleryData();
                break;
            case 'fetch_photo_galleryPage':
                $controller->fetchGalleryPageData();
                break;
            case 'fetch_sevices':
                $controller->fetchServices();
                break;
            case 'get_profile_info':
                $controller->profile_info();
                break;
            case 'get_profile_details':
                $controller->profile_details($data);
                break;
            case 'fetch_all-profiles':
                $controller->allprofiles();
                break;
            default:
                echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Action parameter is missing']);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    // Check if action is set in JSON payload or form data
    $action = isset($data['action']) ? $data['action'] : (isset($_POST['action']) ? $_POST['action'] : null);

    if ($action) {
        switch ($action) {
            case 'register':
                $controller->addRegister($data);
                break;
            case 'login':
                $controller->login($data);
                break;
            case 'update_profile':
                parse_str(file_get_contents('php://input'), $data);

                $controller->update_profile($data);
                break;
            case 'send_otp':
                $controller->sendOtp($data);
                break;
            case 'send_otp_forget':
                $controller->sendOtpForget($data);
                break;
            case 'forget_password_otp_check':
                $controller->forgetPasswordOtpCheck($data);
                break;
            case 'change_password':
                $controller->changePassword($data);
                break;
            case 'upload_profile_image':
                $controller->uploadProfileImage($data);
                break;
                case 'fetch_profile_upload':
                    $controller->fetchProfileUpload($data);
                    break;
                // Add more POST actions as needed
            default:
                echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Action parameter is missing']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
