<?php
/*
	Name    : ffmpeg video converter
    Author  : Vivek P Nair
    Created : 10/06/2014
    Version : 0.01 beta
*/

    
    // Get the values vis POST / GET.

	// Declare necessary Values and get into the code
	$ffmpegCommand = "ffmpeg"; // Incase of windows you will have to add some exe at the end of the ffmpeg file name. Also using absolute path might be required in some cases
	$videowithpath = "";
	$path = "";
	$filenamewoextn = "";
	$sourceVideo = $videowithpath;
	$createdFile = $path.$filenamewoextn;
	$output = "The convertor has been called";

	//Call the functions in your code files/function by including this class ();



// Encode Video to mp4 if not mp4 x264
function Convert2mp4($sourceVideo, $createdFile, $ffmpegCommand)
{
	// Check if FFMPEG exists
    CheckifFfmpegExists();

	$command = $ffmpegCommand.' -i '.$sourceVideo.' -vcodec libx264 -vsync 1 -bt 50k -acodec libfaac '. $createdFile.'_x264.mp4 2>&1';
	exec($command, $output, $status);
	$output .= 'File: '.$file_uploaded."\n".implode("\n", $output);
}

// Encode Video to ogv 
function Convert2Ogv($sourceVideo, $createdFile, $ffmpegCommand)
{
	// Check if FFMPEG exists
    CheckifFfmpegExists();

	$command = $ffmpegCommand.' -i '.$sourceVideo.' -acodec libvorbis '. $createdFile.'.ogv 2>&1';
	exec($command, $output, $status);
	$output .= 'File: '.$file_uploaded."\n".implode("\n", $output);
}

// Encode Video to webm
function Convert2Webm($sourceVideo, $createdFile, $ffmpegCommand)
{
	// Check if FFMPEG exists
    CheckifFfmpegExists();

	$command = $ffmpegCommand.' -i '.$sourceVideo.' '.$createdFile.'.webm 2>&1';
	exec($command, $output, $status);
	$output .= 'File: '.$file_uploaded."\n".implode("\n", $output);
}

// Create a random Screenshot as video place holder
function CreateScreenShot ($sourceVideo, $createdFile, $ffmpegCommand)
{
	// Check if FFMPEG exists
    CheckifFfmpegExists();

	$command = $ffmpegCommand.' -i '.$sourceVideo.' -s 640x360 -r 1 -vframes 5 -ss 00:05 -y '. $createdFile.'_stills_%d.png 2>&1';
	exec($command, $output, $status);
	$output .= 'File: '.$sourceVideo."\n".implode("\n", $output);
}

function returnNames($videowithpath)
{
	// Check if FFMPEG exists
    CheckifFfmpegExists();


	//Strip the string of all the data except the name of the file
	return filenamewoextn;	//Useful to call video with this name inside the page
}

function logger($action, $datetime)
{
	// Check if FFMPEG exists
    CheckifFfmpegExists();

	$logfile = "ffmpegconv.log";
	$outfile = file($logfile);
	if($outfile.is_writeable())
	{
		writelogdata($filename, $action, $datetime);
	}
	else
	{
		$output .= 'Log file not writeable';
	}
}

function writelogdata($filename, $action, $datetime)
{
	// Write the code to write data to the file

}

function exceptionHandler($location, $exceptionMessage, $datetime)
{
	//Write the code to capture the exception and call the function inside the catch / finally area in the try catch finally condition
}

function CheckifFfmpegExists()
{
	if(is_executable("/usr/lib/ffmpeg")) // The location of ffmpeg can be different with respect to the installation method and the operating system that is used.
	{
		$output .= "Ffmpeg exists and is executable"; 
	}
	else
	{
		$output .= "Ffmpeg is not in use, there is no sense in using it to complile this code.. please try after installing.. Application QUitting"
		exit();
	}

}

// TODO
/*
	1. Logging
	2. Streaming and realtime javascript update while encoding (asyncronous)
	3. Other streaming filetype device sensitive (iPhone, Xbox etc)
	4. Error handling
	
?>