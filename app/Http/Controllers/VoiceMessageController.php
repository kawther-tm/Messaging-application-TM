public function recordVoiceMessage(Request $request)
{
    $audioData = $request->input('audioData');

    // TODO: Save the audio data to a file or a database.

    return response()->json(['success' => true]);
}
