\version "2.18.2"
\header {
  title = "Trilobyte"
  composer = "A Shell in the Pit"
  arranger = "Arranged by Matteo Silvestro"
}

% arpeggios
arpeggios = {
  % B-
  \tuplet 3/2 { d8 b fis } \tuplet 3/2 { d' b fis } \tuplet 3/2 { d' b fis } \tuplet 3/2 { d' b fis } |
  \tuplet 3/2 { d'8 b fis } \tuplet 3/2 { d' b fis } \tuplet 3/2 { d' b fis } \tuplet 3/2 { d' b fis }  |
  % E-
  \tuplet 3/2 { cis' b g } \tuplet 3/2 { cis b g } \tuplet 3/2 { cis b g } \tuplet 3/2 { cis b g } |
  \tuplet 3/2 { cis b g } \tuplet 3/2 { cis b g } \tuplet 3/2 { cis b g } \tuplet 3/2 { cis b g } |
  % F#+
  \tuplet 3/2 { fis' e ais, } \tuplet 3/2 { g' e ais, } \tuplet 3/2 { ais' e ais, } \tuplet 3/2 { fis' e ais, } |
  \tuplet 3/2 { fis' cis ais } \tuplet 3/2 { e' cis ais } \tuplet 3/2 { g fis ais  } \tuplet 3/2 { e' ais fis } |
  % B-
  \tuplet 3/2 { d b fis } \tuplet 3/2 { d' b fis } \tuplet 3/2 { d' b fis } \tuplet 3/2 { d' b fis } |
  \tuplet 3/2 { d' b fis } \tuplet 3/2 { d' b fis } <d' fis>2 || \bar "||"
}

% theme of Guitar 2
guitara = {
  r4 b' b8 a b4 | r4 b b8 d b4 | r4 b b8 a b4 | fis'8 g fis d b2 | r4 ais4 ais8 b d4 | r4 cis4 cis8 d fis4 | r4 b, b8 a b4 | b8 a fis d b2 || \bar "||"
}

% theme of Bass
bass = {
  <b fis>1~ | <b fis> | <b, e>~ | <b e> | <ais cis> | <cis fis> | <b' fis>1~ | <b fis> || \bar "||"
}

% theme of Bass solo
bass_solo = {
  <b' fis>1~ | <b fis> | <b, e>~ | <b e> | <ais cis> | <cis fis> | <b d>1~ | <b d> || \bar "||"
}

% simple theme of Guitar 1
guitarb = {
  fis1 | b2 fis | g2. fis4 | e2 d | cis2. d4 | e2 cis | d2. cis4 | d1 ||
}

% refined theme of Guitar 1
guitarc = {
  <<
    { b'1 | d2 b | cis2. b4 | ais2 g | fis2. g4 | ais2 fis4 e | fis2. e4 | fis1 || }
    \\
    { fis1 | b2 fis | g2. fis4 | e2 d | cis2. d4 | e2 cis | d2. cis4 | d1 || }
  >>
}

% flute
flutea = {
  fis2 b | d fis | a fis | cis b | \tuplet 3/2 { fis'8 e cis } \tuplet 3/2 { fis8 ais g } \tuplet 3/2 { fis4 ais e } | \tuplet 3/2 { d cis b } \tuplet 3/2 { ais cis fis } | b2. g4 | fis1 ||
}

% bass 2 (final part)
fluteb = {
  d'2. cis4 | b2 fis | b d | b d | fis \tuplet 3/2 {cis4 ais fis'} | \tuplet 3/2 {e cis fis,} \tuplet 3/2 { ais' g fis} | d2. cis4 | b2 fis ||
}

% final bass part
finalbass = {
  <b d>1~ | <b d> | << { d1 b } \\ { g1~ g } >> | <d' fis>2 <ais cis> | <cis fis> <fis ais> | <b, d>1~ | <b d> || \bar "||"
}

% final chords part
finalchords = {
  \repeat unfold 16 { <b d>8 } | \repeat unfold 16 { <e, g>8 } | \repeat unfold 8 { <fis ais>8 } \repeat unfold 8 { <ais cis>8 } | \repeat unfold 16 { <b d>8 } 
}

% a block of silence
silence = { \repeat unfold 8 { s1 } }

\score {
  <<
  \new Staff \with {
    midiInstrument = #"electric piano 2"
    instrumentName = "El. Piano"
    shortInstrumentName = "EP"
  } {
    \voiceTwo
    \tempo 4 = 135 \time 4/4
    \clef treble
    \key b \minor
    \relative c'' {
      \arpeggios
      \silence
      \silence
      \silence
      \silence
      \silence
      \arpeggios
      \arpeggios
      \arpeggios
      \arpeggios
    }
  }
  \new Staff \with {
    midiInstrument = #"distorted guitar"
    instrumentName = "Guitar 1"
    shortInstrumentName = "G1"
  } {
    \relative c'' {
      \clef treble
      \key b \minor
      \silence
      \silence
      \silence
      \guitarb
      \guitarc
      \guitarc
      \silence
      \silence
      \guitarc
      \guitarc
    }
  }
  \new Staff \with {
    midiInstrument = #"distorted guitar"
    instrumentName = "Guitar 2"
    shortInstrumentName = "G2"
  } {
    \relative c' {
      \clef treble
      \key b \minor
      \silence
      \guitara
      \silence
      \guitara
      \guitara
      \guitara
      \silence
      \silence
      \guitara
      \guitara
    }
  }
  \new Staff \with {
    midiInstrument = #"recorder"
    instrumentName = "Recorder"
    shortInstrumentName = "R"
  } {
    \clef treble
    \key b \minor
    \silence
    \silence
    \silence
    \silence
    \silence
    \silence
    \silence
    \silence
    \silence
    \relative c' \flutea
    \silence
    \relative c' \flutea
  }
  \new Staff \with {
    midiInstrument = #"clarinet"
    instrumentName = "Clarinet"
    shortInstrumentName = "C"
    midiMinimumVolume = #1.0
  } {
    \clef treble
    \key b \minor
    \silence
    \silence
    \silence
    \silence
    \silence
    \silence
    \silence
    \silence
    \silence
    \silence
    \relative c {
      \fluteb
      \fluteb
    }
  }
  \new Staff \with {
    midiInstrument = #"electric piano 2"
    instrumentName = "El. Piano 2"
    shortInstrumentName = "EP2"
  } {
    \clef treble
    \key b \minor
    \silence
    \silence
    \silence
    \silence
    \silence
    \silence
    \silence
    \silence
    \silence
    \silence
    \silence
    \relative c'' \finalchords
  }
  \new Staff \with {
    midiInstrument = #"synthstrings 1"
    instrumentName = "Bass"
    shortInstrumentName = "B"
    midiMaximumVolume = #0.8
  } {
    \clef bass
    \key b \minor
    \silence
    \relative c, {
      \bass_solo
      \bass_solo
    }
    \relative c {
      \bass
      \bass
      \bass
    }
    \silence
    \silence
    \relative c {
      \bass
      \bass
    }
    \relative c {
      \finalbass
      \finalbass
    }
  }
  >>
  \layout {
    \context {
      \Staff
      \RemoveEmptyStaves % don't show empty staves
    }
  }
  \midi { }
}