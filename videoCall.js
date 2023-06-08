const APP_ID = "d86693c4674243aa9aad74f76464db81";
const TOKEN = "007eJxTYBBUFxIWvHIw5dc5ZlYVTtXSxENyqnNYNi2MzboYHS116p8CQ4qFmZmlcbKJmbmJkYlxYqJlYmKKuUmauZmJmUlKkoXhie7GlIZARoZb+6cxMzJAIIjPwpCbmJnHwAAAOZkc9A==+6cxMzJAIIjPwpCbmJnHwAAAOZkc9A==/vUPjA6LHZ6el+qpT1ZS412mqqMvVlWxOVWBIcXCzMzSONnEzNzEyMQ4MdEyMTHF3CTN3MzEzCQlycLwv0BDSkMgI8OyAhdWRgYIBPHZGfILshKzE8sZGADpfx37+ewxx0aUVvc/w8Xqcnd9TnTpBTYEixMDOzNE42MTM3MTIxTky0TExMMTdJMzczMTNJSbIw3JxfmdIQyMiwL/gwKyMDBIL4LAy5iZl5DAwAM90fOw==";
const CHANNEL = "main";

const client = AgoraRTC.createClient({ mode: "rtc", codec: "vp8" });


let localTracks = [];
let remoteUsers = {};
//let username = document.getElementById('myElement').innerHTML;


let joinAndDisplayLocalStream = async () => {
  client.on("user-published", handleUserJoined);

  client.on("user-left", handleUserLeft);

  let UID = await client.join(APP_ID, CHANNEL, TOKEN, null);

  localTracks = await AgoraRTC.createMicrophoneAndCameraTracks();

  let player = `
    <div class="video-container" id="user-container-${UID}">
        <div class="video-player" id="user-${UID}"></div>
        <div class="username">${document.getElementById('username').innerHTML}</div>
    </div>
  `;
  document.getElementById("video-streams").insertAdjacentHTML("beforeend", player);

  localTracks[1].play(`user-${UID}`);

  await client.publish([localTracks[0], localTracks[1]]);
};

let joinStream = async () => {
  await joinAndDisplayLocalStream();
  document.getElementById("join-btn").style.display = "none";
  document.getElementById("stream-controls").style.display = "flex";
};

let handleUserJoined = async (user, mediaType) => {
  remoteUsers[user.uid] = user;
  await client.subscribe(user, mediaType);

  if (mediaType === "video") {
    let player = document.getElementById(`user-container-${user.uid}`);
    if (player != null) {
      player.remove();
    }

    player = `
      <div class="video-container" id="user-container-${user.uid}">
        <div class="video-player" id="user-${user.uid}"></div>
        <div class="username">anon</div>
      </div>`;
    document.getElementById("video-streams").insertAdjacentHTML("beforeend", player);

    user.videoTrack.play(`user-${user.uid}`);
  }

  if (mediaType === "audio") {
    user.audioTrack.play();
  }
};

let handleUserLeft = async (user) => {
  delete remoteUsers[user.uid];
  document.getElementById(`user-container-${user.uid}`).remove();
};

let leaveAndRemoveLocalStream = async () => {
  for (let i = 0; localTracks.length > i; i++) {
    localTracks[i].stop();
    localTracks[i].close();
  }

  await client.leave();
  document.getElementById("join-btn").style.display = "block";
  document.getElementById("stream-controls").style.display = "none";
  document.getElementById("video-streams").innerHTML = "";
};

let toggleMic = async (e) => {
  const micIcon = e.currentTarget.querySelector('i');
  if (localTracks[0].muted) {
    await localTracks[0].setMuted(false);
    micIcon.classList.remove('bx-microphone-off');
    micIcon.classList.add('bx-microphone');
    e.target.style.backgroundColor = "rgb(240, 168, 255)";
  } else {
    await localTracks[0].setMuted(true);
    micIcon.classList.remove('bx-microphone');
    micIcon.classList.add('bx-microphone-off');
    e.target.style.backgroundColor = "#rgb(240, 168, 255)";
  }
};

let toggleCamera = async (e) => {
  const cameraIcon = e.currentTarget.querySelector('i');
  if (localTracks[1].muted) {
    await localTracks[1].setMuted(false);
    cameraIcon.classList.remove('bx-video-off');
    cameraIcon.classList.add('bx-video');
    e.target.style.backgroundColor = "rgb(240, 168, 255)";
  } else {
    await localTracks[1].setMuted(true);
    cameraIcon.classList.remove('bx-video');
    cameraIcon.classList.add('bx-video-off');
    e.target.style.backgroundColor = "#rgb(240, 168, 255)";
  }
};

document.getElementById("join-btn").addEventListener("click", joinStream);
document.getElementById("leave-btn").addEventListener("click", leaveAndRemoveLocalStream);
document.getElementById("mic-btn").addEventListener("click", toggleMic);
document.getElementById("camera-btn").addEventListener("click", toggleCamera);
