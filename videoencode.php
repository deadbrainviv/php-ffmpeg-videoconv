<?php
/*
	Name    : ffmpeg video converter
    Author  : Vivek P Nair
    Created : 10/06/2014
    Version : 0.01 beta
*/

	$ffmpegCommand = "ffmpeg";
	$videowithpath = "";
	$path = "";
	$filenamewoextn = "";
	$sourceVideo = $videowithpath;
	$createdFile = $path.$filenamewoextn;

// Encode Video to mp4 if not mp4 x264
function Convert2mp4($sourceVideo, $createdFile, $ffmpegCommand)
{
	$output = "";
	$command = $ffmpegCommand.' -i '.$sourceVideo.' -vcodec libx264 -vsync 1 -bt 50k -acodec libfaac '. $createdFile.'_x264.mp4 2>&1';
	exec($command, $output, $status);
	$output = 'File: '.$file_uploaded."\n".implode("\n", $output);
}

// Encode Video to ogv 
function Convert2Ogv($sourceVideo, $createdFile, $ffmpegCommand)
{
	$output = "";
	$command = $ffmpegCommand.' -i '.$sourceVideo.' -acodec libvorbis '. $createdFile.'.ogv 2>&1';
	exec($command, $output, $status);
	$output = 'File: '.$file_uploaded."\n".implode("\n", $output);
}

// Encode Video to webm
function Convert2Webm($sourceVideo, $createdFile, $ffmpegCommand)
{
	$output = "";
	$command = $ffmpegCommand.' -i '.$sourceVideo.' '.$createdFile.'.webm 2>&1';
	exec($command, $output, $status);
	$output = 'File: '.$file_uploaded."\n".implode("\n", $output);
}

// Create a random Screenshot as video place holder
function CreateScreenShot ($sourceVideo, $createdFile, $ffmpegCommand)
{
	$output = "";
	$command = $ffmpegCommand.' -i '.$sourceVideo.' -s 640x360 -r 1 -vframes 5 -ss 00:05 -y '. $createdFile.'_stills_%d.png 2>&1';
	exec($command, $output, $status);
	$output = 'File: '.$sourceVideo."\n".implode("\n", $output);
}

function returnNames($videowithpath)
{
	//Strip the string of all the data except the name of the file
	return filenamewoextn;
}

// TODO
/*
	1. Logging
	2. Streaming and realtime javascript update while encoding (asyncronous)
	3. Other streaming filetype device sensitive (iPhone, Xbox etc)
	4. Error handling
	5. Check for existance of ffmpeg
?>