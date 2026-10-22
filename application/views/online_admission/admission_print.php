<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Form - <?php echo isset($admission['first_name']) ? htmlspecialchars($admission['first_name'] . ' ' . $admission['last_name']) : 'Student'; ?></title>
    <style>
        @page {
            size: A4 portrait;
            margin: 5mm 8mm;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            padding: 0;
            color: #333;
            font-size: 9.5pt;
            line-height: 1.25;
        }

        .container {
            max-width: 210mm;
            background-color: white;
            margin: 0 auto;
            padding: 6mm;
            box-shadow: none;
        }

        /* Header Section */
        .header {
            text-align: center;
            border-bottom: 3px solid #1a5490;
            padding-bottom: 5px;
            margin-bottom: 5px;
        }

        .logo-section {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            margin-bottom: 4px;
            width: 100%;
        }

        .logo {
            width: 50px;
            height: 50px;
            background-color: #1a5490;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 20px;
        }

        .logo-full-width {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 4px;
        }

        .logo-full-width img {
            max-width: 100%;
            height: auto;
            max-height: 60px;
            object-fit: contain;
        }

        .form-title {
            font-size: 11pt;
            font-weight: bold;
            color: #1a5490;
            margin-top: 3px;
            text-transform: uppercase;
        }

        /* Reference & Status */
        .ref-status-row {
            display: table;
            width: 100%;
            margin-bottom: 5px;
            border-collapse: collapse;
        }

        .ref-status-col {
            display: table-cell;
            width: 33.33%;
            padding: 3px 6px !important;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
        }

        .ref-status-col label {
            font-weight: bold;
            font-size: 10pt;
            color: #1a5490;
            display: block;
            margin-bottom: 2px;
        }

        .ref-status-col .value {
            font-size: 9pt;
            color: #333;
            font-weight: 500;
        }

        /* Photo in Row */
        .ref-status-col.photo-col {
            text-align: center;
            padding: 3px 6px !important;
        }

        .student-photo-inline {
            max-width: 100px;
            max-height: 115px;
            border: 2px solid #1a5490;
            padding: 2px;
        }

        /* Section Header */
        .section-header {
            background-color: #1a5490;
            color: white;
            padding: 4px 8px;
            font-size: 11pt;
            font-weight: bold;
            text-transform: uppercase;
            margin-top: 6px;
            margin-bottom: 4px;
            border-radius: 2px;
        }

        /* Data Table */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 5px;
        }

        .data-table td {
            padding: 3px 6px !important;
            border: 1px solid #ddd;
            font-size: 9.5pt;
        }

        .data-table .label {
            background-color: #e8f0f7;
            color: #1a5490;
            font-weight: bold;
            width: 25%;
            vertical-align: top;
        }

        .data-table .value {
            background-color: #ffffff;
            color: #333;
            vertical-align: top;
            word-wrap: break-word;
        }

        /* Two Column Layout */
        .two-col {
            display: table;
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 5px;
        }

        .col-50 {
            display: table-cell;
            width: 50%;
            padding: 4px 6px !important;
            border: 1px solid #ddd;
            font-size: 9.5pt;
            vertical-align: top;
        }

        .col-50 .label {
            background-color: #e8f0f7;
            color: #1a5490;
            font-weight: bold;
            padding: 3px 6px !important;
            margin-bottom: 3px;
            display: block;
            font-size: 10pt;
        }

        .col-50 .value {
            line-height: 1.3;
            color: #333;
        }

        /* Print Button */
        .no-print {
            display: block;
        }

        .print-button-container {
            text-align: center;
            margin-bottom: 5px;
            padding: 5px;
            background-color: #f5f5f5;
        }

        .print-btn {
            background-color: #1a5490;
            color: white;
            border: none;
            padding: 6px 18px;
            font-size: 10pt;
            font-weight: bold;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .print-btn:hover {
            background-color: #0d3a63;
        }

        /* Footer */
        .footer {
            margin-top: 6px;
            padding-top: 6px;
            border-top: 2px solid #ddd;
            font-size: 8.5pt;
            color: #999;
            text-align: center;
        }

        /* Print Styles */
        @media print {
            body {
                background-color: white;
                padding: 0;
                font-size: 9.5pt;
            }

            .container {
                max-width: 100%;
                box-shadow: none;
                padding: 6mm;
                margin: 0;
            }

            .no-print {
                display: none !important;
            }

            .section-header,
            .label {
                background-color: #ddd !important;
                color: #000 !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            table {
                page-break-inside: avoid;
            }

            tr {
                page-break-inside: avoid;
            }

            .data-table td,
            .data-table th,
            .col-50,
            .ref-status-col {
                padding: 3px 6px !important;
            }

            .student-photo-admission {
                width: 120px !important;
                max-width: 120px !important;
                height: 120px !important;
                max-height: 120px !important;
            }
        }

        @media screen and (max-width: 768px) {
            .container {
                padding: 10px;
            }

            .two-col {
                display: block;
            }

            .col-50 {
                display: block;
                width: 100%;
            }

            .ref-status-row {
                display: block;
            }

            .ref-status-col {
                display: block;
                width: 100%;
                margin-bottom: 8px;
            }
        }
    </style>
</head>
<body>
    <!-- Print Button -->
    <div class="print-button-container no-print">
        <button class="print-btn" onclick="window.print()">
            <i class="fas fa-print"></i> Print Admission Form
        </button>
    </div>

    <!-- Main Container -->
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="logo-full-width">
                <?php if(isset($logo_image) && !empty($logo_image)): ?>
                    <img src="<?php echo $logo_image; ?>" alt="Logo">
                <?php else: ?>
                    <div class="logo">📚</div>
                <?php endif; ?>
            </div>
            <div class="form-title">Online Admission Form</div>
        </div>

        <!-- Admission Details -->
        <div class="section-header">Admission Details</div>
        <table class="data-table" style="border-collapse: collapse;">
            <tr style="vertical-align: top;">
                <td style="width: 65%; padding-right: 4px;">
                    <table class="data-table" style="width: 100%;">
                        <tr>
                            <td class="label">Reference No.</td>
                            <td class="value"><?php echo htmlspecialchars($admission['reference_no']); ?></td>
                        </tr>
                        <tr>
                            <td class="label">Status</td>
                            <td class="value">
                                <?php
                                    if ($admission['status'] == 1) echo '<strong style="color: orange;">Applied</strong>';
                                    elseif ($admission['status'] == 2) echo '<strong style="color: green;">Approved</strong>';
                                    elseif ($admission['status'] == 3) echo '<strong style="color: red;">Declined</strong>';
                                    else echo 'Pending';
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="label">Application Date</td>
                            <td class="value"><?php echo isset($admission['apply_date']) ? date('d-M-Y', strtotime($admission['apply_date'])) : 'N/A'; ?></td>
                        </tr>
                        <tr>
                            <td class="label">Class</td>
                            <td class="value"><?php echo isset($admission['class_name']) ? htmlspecialchars($admission['class_name']) : 'N/A'; ?></td>
                        </tr>
                        <tr>
                            <td class="label">Section</td>
                            <td class="value"><?php echo isset($admission['section_name']) ? htmlspecialchars($admission['section_name']) : 'N/A'; ?></td>
                        </tr>
                        <tr>
                            <td class="label">Category</td>
                            <td class="value"><?php echo isset($admission['category_name']) ? htmlspecialchars($admission['category_name']) : 'N/A'; ?></td>
                        </tr>
                    </table>
                </td>
                <td style="width: 35%; padding-left: 4px; text-align: center;">
                    <?php if (!empty($admission['student_photo'])) { ?>
                        <img src="<?php echo get_image_url('student', $admission['student_photo']); ?>" alt="Student Photo" class="student-photo-admission" style="max-width: 100px; max-height: 110px; width: 100px; height: 110px; border-radius: 4px; border: 1px solid #ddd;">
                    <?php } else { ?>
                        <div style="color: #999; font-size: 9pt; padding: 20px 10px; border: 1px solid #ddd; border-radius: 4px; width: 100px; height: 110px; display: flex; align-items: center; justify-content: center;">No Photo</div>
                    <?php } ?>
                </td>
            </tr>
        </table>

        <!-- Student Information -->
        <div class="section-header">Student Information</div>
        <table class="data-table">
            <tr>
                <td class="label">Full Name</td>
                <td class="value">
                    <?php echo htmlspecialchars($admission['first_name'] . ' ' . $admission['last_name']); ?>
                </td>
                <td class="label">Date of Birth</td>
                <td class="value">
                    <?php echo isset($admission['birthday']) ? date('d-M-Y', strtotime($admission['birthday'])) : 'N/A'; ?>
                </td>
            </tr>
            <tr>
                <td class="label">Gender</td>
                <td class="value"><?php echo isset($admission['gender']) ? ucfirst(htmlspecialchars(trim($admission['gender']))) : 'N/A'; ?></td>
                <td class="label">Blood Group</td>
                <td class="value"><?php echo (isset($admission['blood_group']) && !empty(trim($admission['blood_group']))) ? htmlspecialchars(trim($admission['blood_group'])) : 'N/A'; ?></td>
            </tr>
            <tr>
                <td class="label">Religion</td>
                <td class="value"><?php echo isset($admission['religion']) ? htmlspecialchars($admission['religion']) : 'N/A'; ?></td>
                <td class="label">Mobile No</td>
                <td class="value"><?php echo isset($admission['mobile_no']) ? htmlspecialchars($admission['mobile_no']) : 'N/A'; ?></td>
            </tr>
            <tr>
                <td class="label">Email</td>
                <td class="value"><?php echo isset($admission['email']) ? htmlspecialchars($admission['email']) : 'N/A'; ?></td>
                <td class="label">Category</td>
                <td class="value"><?php echo isset($admission['category_name']) ? htmlspecialchars($admission['category_name']) : 'N/A'; ?></td>
            </tr>
            <tr>
                <td class="label">Birth Registration Number</td>
                <td class="value"><?php echo isset($custom_fields[7]) ? htmlspecialchars($custom_fields[7]) : 'N/A'; ?></td>
                <td class="label">National ID Number</td>
                <td class="value"><?php echo isset($custom_fields[8]) ? htmlspecialchars($custom_fields[8]) : 'N/A'; ?></td>
            </tr>
        </table>

        <!-- Guardian Information -->
        <div class="section-header">Guardian Information</div>
        <div class="two-col">
            <div class="col-50">
                <span class="label">Father's Details</span>
                <div class="value">
                    <strong>Name:</strong> <?php echo isset($admission['father_name']) ? htmlspecialchars($admission['father_name']) : 'N/A'; ?><br>
                    <strong>Occupation:</strong> <?php echo isset($admission['grd_occupation']) ? htmlspecialchars($admission['grd_occupation']) : 'N/A'; ?><br>
                    <strong>Mobile:</strong> <?php echo isset($admission['grd_mobile_no']) ? htmlspecialchars($admission['grd_mobile_no']) : 'N/A'; ?><br>
                    <strong>Email:</strong> <?php echo isset($admission['grd_email']) ? htmlspecialchars($admission['grd_email']) : 'N/A'; ?>
                </div>
            </div>
            <div class="col-50">
                <span class="label">Mother's Details</span>
                <div class="value">
                    <strong>Name:</strong> <?php echo isset($admission['mother_name']) ? htmlspecialchars($admission['mother_name']) : 'N/A'; ?><br>
                    <strong>Occupation:</strong> <?php echo isset($admission['grd_occupation']) ? htmlspecialchars($admission['grd_occupation']) : 'N/A'; ?><br>
                    <strong>Mobile:</strong> <?php echo isset($admission['grd_mobile_no']) ? htmlspecialchars($admission['grd_mobile_no']) : 'N/A'; ?><br>
                    <strong>Email:</strong> <?php echo isset($admission['grd_email']) ? htmlspecialchars($admission['grd_email']) : 'N/A'; ?>
                </div>
            </div>
        </div>

        <!-- Academic Information -->
        <div class="section-header">Academic Information</div>
        <table class="data-table">
            <?php 
            if (isset($academic_info) && !empty($academic_info)) {
                $count = 0;
                foreach ($academic_info as $field_label => $field_value) {
                    if ($count % 2 == 0) {
                        echo '<tr>';
                    }
                    echo '<td class="label">' . htmlspecialchars($field_label) . '</td>';
                    echo '<td class="value">' . htmlspecialchars(ucfirst($field_value)) . '</td>';
                    $count++;
                    if ($count % 2 == 0) {
                        echo '</tr>';
                    }
                }
                if ($count % 2 != 0) {
                    echo '<td class="label"></td><td class="value"></td></tr>';
                }
            } else {
                echo '<tr><td colspan="4" align="center" style="padding: 15px; color: #999;">No Academic Information Available</td></tr>';
            }
            ?>
        </table>

        <!-- Address Information -->
        <div class="section-header">Address Information</div>
        <div class="two-col">
            <div class="col-50">
                <span class="label">Present Address</span>
                <div class="value">
                    <?php echo isset($admission['present_address']) ? htmlspecialchars($admission['present_address']) : 'N/A'; ?><br>
                    <?php echo isset($admission['city']) ? '<strong>City:</strong> ' . htmlspecialchars($admission['city']) : ''; ?><br>
                    <?php echo isset($admission['state']) ? '<strong>State:</strong> ' . htmlspecialchars($admission['state']) : ''; ?>
                </div>
            </div>
            <div class="col-50">
                <span class="label">Permanent Address</span>
                <div class="value">
                    <?php echo isset($admission['permanent_address']) ? htmlspecialchars($admission['permanent_address']) : 'N/A'; ?><br>
                    <?php echo isset($admission['city']) ? '<strong>City:</strong> ' . htmlspecialchars($admission['city']) : ''; ?><br>
                    <?php echo isset($admission['state']) ? '<strong>State:</strong> ' . htmlspecialchars($admission['state']) : ''; ?>
                </div>
            </div>
        </div>

    </div>

    <script>
        var isPrinting = false;
        window.addEventListener('beforeprint', function() {
            isPrinting = true;
        });
        window.addEventListener('afterprint', function() {
            isPrinting = false;
        });
    </script>
</body>
</html>
